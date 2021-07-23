<?php

namespace App\Http\Controllers\Charts\Comparativo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Data;
use Carbon\Carbon;
use DB;
use App\Models\UrlShorter;

class AjaxController extends Controller
{
    
    public function shorter($url)
    {
        $urlShorter = UrlShorter::where('url',$url)->first();
        if($urlShorter) {
            return ['id' => $urlShorter->id];
        }
        $urlShorter = (new UrlShorter())->create(['url' => $url]);
        return ['id' => $urlShorter->id];
    }
    
    public function getHash($id)
    {
        $urlShorter = UrlShorter::find($id);
        return ['url' => ($urlShorter) ? $urlShorter->url : ''];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function country(Request $request)
    {
        return Data::query()
                ->distinct()
                ->select('pais')
                ->where('reporte','=', $request->get('report'))
                ->where('cultivo','=', $request->get('type'))
                ->whereNotNull('pais')
                ->get();
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function zone(Request $request)
    {
        $country = $request->get('country','');
        $zone = Data::query()
                ->distinct()
                ->select('zona')
                ->where('reporte','=', $request->get('report'))
                ->where('cultivo','=', $request->get('type'))
                ->whereNotNull('zona');
        
        if ($country) {
            $zone->where('pais','=',$country);
        }
                
        return $zone->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function variedad(Request $request)
    {
        $country = $request->get('country','');
        $zone = $request->get('zone','');

        $variedad = Data::query()
                ->distinct()
                ->select('genotipo')
                ->where('reporte','=', $request->get('report'))
                ->where('cultivo','=', $request->get('type'))
                ->whereNotNull('genotipo')
                ->orderBy('genotipo');

        if ($country) {
            $variedad->where('pais','=',$country);
        }  
        if ($zone) {
            $variedad->whereIn('zona',$zone);
        }

        return $variedad->get();
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fecha(Request $request)
    {
        $country = $request->get('country','');
        $zone = $request->get('zone','');
        $variety[] = $request->get('variety1','');
        $variety[] = $request->get('variety2','');

        $variedad = Data::query()
                ->distinct()
                ->select('nrango as rango_fs')
                ->where('reporte','=', $request->get('report'))
                ->where('cultivo','=', $request->get('type'))
                ->whereIn('genotipo',$variety);        

        if ($country) {
            $variedad->where('pais','=',$country);
        } 
        
        if ($zone) {
            $variedad->whereIn('zona', $zone);
        } 

        $data = [];
        $fechas = $variedad->get();
        return $fechas;
    } 
    
    public function data(Request $request)
    {
        $country = $request->get('country','');
        $zone = $request->get('zone','');
        $variety[] = $request->get('variety1','');
        $variety[] = $request->get('variety2','');
        $fSiembra = $request->get('f_siembra','');

        $data[0] = $this->first($request, $country, $zone, $variety, $fSiembra);
        $data[1] = $this->second($request, $country, $zone, $variety, $fSiembra);
        $data = unserialize(str_replace(array('NAN;','INF;'),'0;',serialize($data)));
        return $data;
    }

    private function first(Request $request, $country, $zone, $variety, $fechaSiembra)
    {
        $out = [];
        $tmp = [];
        $totalKey =[];
        $datosCollection = Data::select('pais', 'zona','nro_ensayo', 'genotipo', 'campana', 'localidad', 'rendimiento', 'f_siembra', 'rango_fs','ia')
        //$datosCollection = Data::select('pais', 'zona','nro_ensayo', 'genotipo', 'campana', 'localidad', 'rendimiento', 'f_siembra', 'rango_fs')
                ->where('reporte','=', $request->get('report'))
                ->where('cultivo','=', $request->get('type'))   
                ->where('pais','=', $country)
                ->whereIn('zona', $zone)
                ->whereIn('genotipo', $variety)
                ->where('rendimiento','>',0)
                ->whereRaw('campana is not null');  
        
        if ($fechaSiembra) {
            $datosCollection->where('nrango','=',$fechaSiembra);
        }
        
        //$datosCollection->groupBy()
        /*$datosCollection->orderBy('campana', 'asc')
                ->orderBy('f_siembra', 'asc')
                ->orderBy('genotipo', 'asc'); */
        $datosCollection->orderBy('nro_ensayo','asc');
        $datosCollection->orderBy('genotipo','asc');
        //dd($datosCollection->toSql());        
        $datos = $datosCollection->get(); 
        
        foreach ($datos as $key => $value){
            //$newKey = str_replace(" ", "",  $value->nro_ensayo.$value->localidad.$value->campana. $value->f_siembra);
            $newKey = $value->ia;
            if (isset($totalKey[$newKey][$value->genotipo])) {
                continue;
            }
            $tmp[$newKey][] = ['pais' => $value->pais, 'genotipo' => $value->genotipo, 'rendimiento' => $value->rendimiento, 'fecha' => $value->f_siembra, 'campana' => $value->campana, 'zona' => $value->zona, 'localidad' => $value->localidad, 'ia' => $value->ia ];
            $totalKey[$newKey][$value->genotipo] = 1;
            
        }
        
            
        foreach ($tmp as $key => $value) {
            /*if( $tmp[$key][0]['genotipo'] ==  @$tmp[$key][1]['genotipo'] ){
                continue;
            }*/

            if (count($totalKey[$key]) == count($variety)) {
                foreach($value as $subValue) {
                    $out[] = $subValue;
                }
            }
        }
        if ($request->get('test','')) {
        //dd($out);
        }
        $salida[0] = $out;
        $i = 0;
        $sum        = [];
        $suma       = [];
        $ganados[0] = 0;
        $ganados[1] = 0;
        $out        =  null;

        foreach ($tmp as $key => $value) {

            /*if( $tmp[$key][0]['genotipo'] ==  @$tmp[$key][1]['genotipo'] ) {
                    continue;
            }*/

            if(count( $totalKey[$key] ) == count($variety) ){
                //print_r($value); 
                $value[0]['rendimiento'] = floor($value[0]['rendimiento']);
                $value[1]['rendimiento'] = floor($value[1]['rendimiento']);
                $j = 1;
                $prom = 0;

                foreach ($value as $subKey => $subValue) {
                    
                    $prom += $subValue['rendimiento']; 
                    $j++;
                    if(!isset($sum[$subKey])) {
                        $sum[$subKey] = 0;
                    }
                    $sum[$subKey] += $subValue['rendimiento'];
                }

                if(count( $value ) >= 2 ){
                    
                    $value[0]['ia'] =  ($value[0]['rendimiento'] + $value[1]['rendimiento']) / 2 ;
                    $value[1]['ia'] =  ($value[0]['rendimiento'] + $value[1]['rendimiento']) / 2 ;
                    $value[0]['dif'] = $value[0]['rendimiento'] - $value[1]['rendimiento'] ;
                    $value[1]['dif'] = $value[0]['rendimiento'] - $value[1]['rendimiento'] ; 

                    if($value[0]['dif'] > 0) {
                        @$ganados[0]++;
                    }

                    if($value[1]['dif'] < 0) {
                        @$ganados[1]++;
                    }
                    
                    @$suma[0] += $value[0]['rendimiento'];
                    @$suma[1] += $value[1]['rendimiento'];
                    //echo "{$value[0]['rendimiento']} {$suma[0]} {}<br>";
                }
                $out[$i] = $value;
                $i++;
            }
        }
        //dd($out);
        $data['data'] =  $out;
        if($data['data']) {
            $rendimiento_promedio[0] = @round( @$suma[0] / count($data['data']), 2 );
            $rendimiento_promedio[1] = @round( @$suma[1] / count($data['data']), 2 );
            $rendimiento_promedio[2] = round( ( $rendimiento_promedio[0] + $rendimiento_promedio[1] ) / 2, 2 );
            $indice[0]  = @round( $rendimiento_promedio[0] / $rendimiento_promedio[2] * 100, 2 );
            $indice[1]  = @round( $rendimiento_promedio[1] / $rendimiento_promedio[2] * 100, 2 );
            $indice[2]  = @round( $rendimiento_promedio[2] / $rendimiento_promedio[2] * 100, 2 );
            $porcentaje_ganados[0] =  number_format( @( $ganados[0] / count($data['data']) ) * 100, 2);
            $porcentaje_ganados[1] =  number_format( @( $ganados[1] / count($data['data']) ) * 100, 2);
            $salida[1][] = $rendimiento_promedio;
            $salida[1][] = $indice;
            $salida[1][] = $porcentaje_ganados;
        }
        if ($request->get('test','')) {
            dd($salida);
        }
        return $salida;        
    }
    
    private function second(Request $request, $country, $zone, $variety, $fechaSiembra)
    {
        $out = [];
        $tmp = [];
        $yValuesOne = [];
        $yValuesTwo = [];
        $xValuesOne = [];
        $xValuesTwo = []; 
        $totalKey = [];
        
        $datosCollection = Data::select('genotipo','rendimiento','nro_ensayo', 'rango_fs', 'localidad', 'f_siembra', 'campana','ia')
                ->where('reporte','=', $request->get('report'))
                ->where('cultivo','=', $request->get('type'))   
                ->where('pais','=', $country)
                ->whereIn('zona', $zone)
                ->whereIn('genotipo', $variety)
                ->whereRaw('campana is not null')   
                ->where('rendimiento','>',0)
                ->orderBy('nro_ensayo','asc')
                ->orderBy('genotipo', 'asc');   
        
        if ($fechaSiembra) {
            $datosCollection->where('nrango','=',$fechaSiembra);
        }      

        $datos = $datosCollection->get(); 

        foreach ($datos as $key => $value){
            //$newKey = str_replace(" ", "",  $value->nro_ensayo.$value->localidad.$value->campana. $value->f_siembra);
            $newKey = $value->ia;
            if (isset($totalKey[$newKey][$value->genotipo])) {
                continue;
            }            
            $tmp[$newKey][] = ['genotipo' => $value->genotipo, 'rendimiento' => $value->rendimiento, 'fecha' => $value->f_siembra, 'localidad' => $value->localidad, 'campana' => $value->campana, 'ia' => $value->ia ];
            $totalKey[$newKey][$value->genotipo] = 1;
            
        }
        
        $i = 0;
        
        foreach ($tmp as $key => $value) {

            /*if ($tmp[$key][0]['genotipo'] ==  @$tmp[$key][1]['genotipo']) {
                continue;
            }*/
            
            if (count( $totalKey[$key] ) == count($variety)) {

                $j = 1; $prom = 0;

                foreach ($value as $subValue) {
                    $prom += $subValue['rendimiento']; 
                    $j++;
                }

                $out[$i] = $value;
                for ($f = 0; $f < count($variety); $f++) {
                    $out[$i][$f]['prom'] = $prom / count($value);
                }

                if (is_array($out[$i])) {
                    $yValuesOne[] =  floatval($out[$i][0]['rendimiento']);
                    $yValuesTwo[] =  floatval($out[$i][1]['rendimiento']);
                    $xValuesOne[] =  floatval($out[$i][0]['prom']);
                    $xValuesTwo[] =  floatval($out[$i][1]['prom']);
                }
                $i++;
            }
        }
        
        sort($xValuesOne);
        sort($xValuesTwo);
        sort($yValuesOne);
        sort($yValuesTwo);

        if ($xValuesTwo && $yValuesTwo) {
            $trendOne = $this->linearRegression($xValuesOne, $yValuesOne) ;
            $trendOneStart = ($trendOne['m'] * $xValuesOne[0]) + $trendOne['b'];
            $trendOneEnd = ($trendOne['m'] * end($xValuesOne)) + $trendOne['b'];
        }

        if ($xValuesTwo && $yValuesTwo) {
            $trendTwo = $this->linearRegression($xValuesTwo, $yValuesTwo) ;
            $trendTwoStart = ($trendTwo['m'] * $xValuesTwo[0]) + $trendTwo['b'];
            $trendTwoEnd = ($trendTwo['m'] * end($xValuesTwo)) + $trendTwo['b'];
        }

        foreach ($out as $key => $value) {
            $value[0]['trendOneStart']  = $trendOneStart;
            $value[0]['trendOneEnd']    = $trendOneEnd;
            $value[0]['trendTwoStart']  = $trendTwoStart;
            $value[0]['trendTwoEnd']    = $trendTwoEnd;
            $out[$key]  = $value;
        }

        return $out;        
    }
    
    public function linearRegression($x, $y) 
    {
        // calculate number points
        $n = count($x);
        
        // ensure both arrays of points are the same size
        if ($n != count($y)) {
          trigger_error("linear_regression(): Number of elements in coordinate arrays do not match.", E_USER_ERROR);
        }
  
        // calculate sums
        $x_sum = array_sum($x);
        $y_sum = array_sum($y);
        $xx_sum = 0;
        $xy_sum = 0;
        for($i = 0; $i < $n; $i++) {
          $xy_sum+=($x[$i]*$y[$i]);
          $xx_sum+=($x[$i]*$x[$i]);
        }
        // calculate slope
        $m =  @((($n * $xy_sum) - ($x_sum * $y_sum)) / (($n * $xx_sum) - ($x_sum * $x_sum)));
        // calculate intercept
        $b = ($y_sum - ($m * $x_sum)) / $n;
        // return result
        return array("m"=>$m, "b"=>$b);
    }    
}

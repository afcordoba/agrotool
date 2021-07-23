<?php

namespace App\Http\Controllers\Charts\Densidad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Data;
//use Carbon\Carbon;

class AjaxController extends Controller
{
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
                ->where('cultivo','=', $request->get('type'));
        
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
                ->select('variedad')
                ->where('reporte','=', $request->get('report'))
                ->where('cultivo','=', $request->get('type'));

        if ($country) {
            $variedad->where('pais','=',$country);
        }  
        if ($zone) {
            $variedad->where('zona','=',$zone);
        }
        return $variedad->orderBy('variedad')->get();
    }    

    public function data(Request $request)
    {
        $country = $request->get('country');
        $zone = $request->get('zone');
        $variety1 = $request->get('variety1');
        
        $temp = [];
        $dataCollection = Data::selectRaw("ambiente, gm, rendimiento, planta_m2 as rango_fs, rango_optimo")
                ->where('reporte','=', $request->get('report')) 
                ->where('cultivo','=', $request->get('type'))
                ->where('pais','=', $country)  
                ->where('zona','=', $zone)
                ->where('variedad','=', $variety1)->get();            

        foreach ($dataCollection as $data) {
            $data->ambiente=trim($data->ambiente);
            
            if (!isset($temp[$data->ambiente]['head']) || !in_array($data->gm, $temp[$data->ambiente]['head'])) {
                if(!isset($temp[$data->ambiente]['head'])) {
                    $temp[$data->ambiente]['head'][] = 'rango';
                }
                $temp[$data->ambiente]['head'][] = $data->gm;
            }
            $key = array_search($data->gm, $temp[$data->ambiente]['head']);
            $temp[$data->ambiente]['body'][(string)$data->rango_fs][$key] = $data->rendimiento; 
            $temp[$data->ambiente]['rango'] = $data->rango_optimo;
        }
        
        $res = array();
        foreach ($temp as $ambiente => $data) {
            $res[$ambiente]['head'] = $data['head'];
            $minValue = null;
            $maxValue = null;
            foreach($data['body'] as $rango_fs => $values) {
                $values[0] = (float) $rango_fs;
                if (!isset($res[$ambiente]['body'])) {
                    $empyHead = array();
                    for($i = 0; $i<count($values); $i++) {
                        $empyHead[] = '';
                    }
                    $res[$ambiente]['body'][] = (object) $empyHead;
                }
                $res[$ambiente]['body'][] = $values;
                if ($values[0] < $minValue || is_null($minValue)) {
                    $minValue = $values[0];
                }
                if ($values[0] > $maxValue || is_null($maxValue)) {
                    $maxValue = $values[0];
                }
                $res[$ambiente]['limits'] = [(float) $minValue,(float)$maxValue];                
                $res[$ambiente]['rango'] = $data['rango'];
            }
            
        }
        return $res;
    }    
}

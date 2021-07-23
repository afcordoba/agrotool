<?php

namespace App\Http\Controllers\Charts\Fecha;

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
        $variety[] = $request->get('variety1');
        $variety[] = $request->get('variety2');
        $temp = [];
        
        $dataCollection = Data::selectRaw(
                "ambiente, gm, rendimiento, rango_fs, fs_1_a_fs_2_v, fs_2_a_fs_3_v, fs_3_a_fs_4_v,".
                "fs_1_a_fs_2, fs_2_a_fs_3, fs_3_a_fs_4, rango_optimo")
                ->where('reporte','=', $request->get('report')) 
                ->where('cultivo','=', $request->get('type'))
                ->where('pais','=', $country)
                ->where('zona', $zone)                
                ->whereIn('variedad', $variety)
                ->get(); 

        foreach ($dataCollection as $data) {
            
            if (!isset($temp[$data->ambiente]['head']) || !in_array($data->gm, $temp[$data->ambiente]['head'])) {
                if(!isset($temp[$data->ambiente]['head'])) {
                    $temp[$data->ambiente]['head'][] = 'rango';
                }
                $temp[$data->ambiente]['head'][] = $data->gm;
            }
            
            if(!isset($temp[$data->ambiente]['headTable'])) {
                $temp[$data->ambiente]['headTable'] = ['Rango', $data->fs_1_a_fs_2, $data->fs_2_a_fs_3, $data->fs_3_a_fs_4, 'Rango Óptimo'];
                
            }
            $temp[$data->ambiente]['bodyTable'][$data->gm] = [$data->gm, $data->fs_1_a_fs_2_v, $data->fs_2_a_fs_3_v, $data->fs_3_a_fs_4_v, $data->rango_optimo];
            
            
            
            $key = array_search($data->gm, $temp[$data->ambiente]['head']);
            $temp[$data->ambiente]['body'][$data->rango_fs][$key] = $data->rendimiento; 
            
        }
       
        $res = array();
        foreach ($temp as $ambiente => $data) {
            $minValue = null;
            $maxValue = null;
            $res[$ambiente]['head'] = $data['head'];
            foreach($data['body'] as $rango_fs => $values) {
                $values[0] = $rango_fs;
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
                $res[$ambiente]['limits'] = [(int) $minValue,(int)$maxValue];
            }
            
            
            
            $res[$ambiente]['table'][] = $temp[$ambiente]['headTable'];
            foreach($data['bodyTable'] as $rango_fs => $values) {
                $res[$ambiente]['table'][] = $values;

            }
        }
        return $res;
    }

}

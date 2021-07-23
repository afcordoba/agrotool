<?php

namespace App\Http\Controllers\Charts\Fenologico;

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
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fecha(Request $request)
    {
        $country = $request->get('country','');
        $zone = $request->get('zone','');
        
        $variedad = Data::query()
                ->distinct()
                ->select('fecha')
                ->where('reporte','=', $request->get('report'))
                ->where('cultivo','=', $request->get('type'));

        if ($country) {
            $variedad->where('pais','=',$country);
        } 
        
        if ($zone) {
            $variedad->where('zona','=',$zone);
        } 
        
        
        return $variedad->get();
    }       
    
    public function data(Request $request)
    {
        $country = $request->get('country');
        $zone = $request->get('zone');
        $variety = [];
        if ($request->has('variety1')) {
            $variety[] = $request->get('variety1');
        }  
        
        if ($request->has('variety2')) {
            $variety[] = $request->get('variety2');
        }  

        $data = Data::selectRaw('variedad, dias_desde_1_10,dds,dias_desde_1_09, s_e, e_r1, r1_r3, r3_r5, r5_r7, r7_r8, e_r8,'.
                'e_vt,vt_r1,r1_r5 as r1_r6, e_r6,e_encanazon,encanazon_espigazon,espigazon_madurez_fisiologica,dde_mf')
                ->where('reporte','=', $request->get('report')) 
                ->where('cultivo','=', $request->get('type'))
                ->where('pais','=', $country)
                ->where('zona', $zone);    
        
        if ($variety) {
            $data->whereIn('variedad', $variety); 
        }

        if ($request->has('f_siembra')) {
            $data->where('fecha', '=',$request->get('f_siembra')); 
        }
        $data->orderBy('fs');

        return $data->get();
    }
}

<?php

namespace App\Http\Controllers\Charts\Recomendador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Data;
use View;
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
    public function potencial(Request $request)
    {
        $country = $request->get('country','');
        $zone = $request->get('zone','');
        
        $variedad = Data::query()
                ->distinct()
                ->select('tipo_rendimiento')
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
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function escenario(Request $request)
    {
        $country = $request->get('country','');
        $zone = $request->get('zone','');
        
        $variedad = Data::query()
                ->distinct()
                ->select('tipo_climatico')
                ->where('reporte','=', $request->get('report'))
                ->where('cultivo','=', $request->get('type'))
                ->where('tipo_rendimiento','=', $request->get('potencial'));

        if ($country) {
            $variedad->where('pais','=',$country);
        }  
        if ($zone) {
            $variedad->where('zona','=',$zone);
        }
        
        if ($zone) {
            $variedad->where('zona','=',$zone);
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
        
        $variedad = Data::query()
                ->distinct()
                ->select('rango_fs')
                ->where('reporte','=', $request->get('report'))
                ->where('cultivo','=', $request->get('type'))
                ->where('rango_fs','!=','')
                ->where('tipo_rendimiento','=', $request->get('potencial'))
                ->where('tipo_climatico','=', $request->get('escenario'));

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
        $potencial = $request->get('potencial','');
        $escenario = $request->get('escenario','');
        $fecha = $request->get('fecha','');
        $temp = [];        

        $query = Data::select('*')
                ->where('reporte','=', $request->get('report')) 
                ->where('cultivo','=', $request->get('type'))
                ->where('pais', '=',  $country)
                ->where('zona', '=',  $zone);
        if ($potencial != '') {        
                $query->where('tipo_rendimiento','=', $potencial);
        }
        
        if ($escenario != '') {        
                $query ->where('tipo_climatico','=', $escenario);
        }

        if ($fecha != '') {        
                $query ->where('rango_fs','=', $fecha);
        }
        
        $data = $query->orderBy('tipo_climatico')->get();
        return View::make('charts.recomendador.table', compact('data'));
    }    
}

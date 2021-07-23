<?php

namespace App\Http\Controllers\Charts\Recomendador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Data;
use View;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $type)
    {
        $request->merge(['type' => $type, 'layout' => 'layouts.app']);
        return view('charts.recomendador.index', compact('request'));
    }

    public function show(Request $request, $type = 'soja')
    {
        $request->merge(['type' => $type, 'layout' => 'layouts.public']);
        return view('charts.recomendador.index', compact('request'));
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function table(Request $request)
    {
        $country = $request->get('country');
        $zone = $request->get('zone');
        $potencial = $request->get('potencial','');
        $escenario = $request->get('escenario','');
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
        $query = $query->orderBy('tipo_climatico')->get();
        return View::make('charts.recomendador.show', compact('data'));
    }


}

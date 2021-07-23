<?php

namespace App\Http\Controllers\Charts\Fecha;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChartController extends Controller
{
    /**
     * Display the chart
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $type)
    {
        $request->merge(['type' => $type, 'layout' => 'layouts.app']);
        return view('charts.fecha.index', compact('request'));
    }  
    
    public function show(Request $request, $type = 'soja')
    {
        $request->merge(['type' => $type, 'layout' => 'layouts.public']);
        return view('charts.fecha.index', compact('request'));
    }    
}

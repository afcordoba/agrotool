<?php

namespace App\Http\Controllers\Charts\Comparativo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $type = 'soja')
    {
        $request->merge(['type' => $type, 'layout' => 'layouts.app']);
        return view('charts.comparativo.index', compact('request'));
    }

    public function show(Request $request, $type = 'soja')
    {
        $request->merge(['type' => $type, 'layout' => 'layouts.public']);
        return view('charts.comparativo.index', compact('request'));
    }
}

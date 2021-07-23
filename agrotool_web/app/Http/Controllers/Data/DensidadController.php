<?php

namespace App\Http\Controllers\Data;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Data;
use Carbon\Carbon;
use App\Exports\DataExport;
use App\Imports\DensidadImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class DensidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $report = 'densidad';
        $data = Data::search($report)->where('reporte','=',$report);
        $sort = Input::get('sort',''); // get terms to search
        if ($sort) {
            $data->orderBy('variedad',$sort);
        }
        $data = $data->paginate(100);
        $fields = Data::$fields[$report];
        return view('data.densidad.index', compact('data','request','fields'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data.densidad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function export(Request $request)
    {
        return Excel::download(new DataExport('densidad','densidad'), 'densidad.xlsx');
    }
    
    public function import(Request $request)
    {
        if (!$request->hasFile('import-file')) {
            $request->session()->flash('alert-danger', 'Debes seleccionar un archivo');
            return Redirect::back(); 
        } 
        $extension = $request->file('import-file')->getClientOriginalExtension();
        if(!in_array($extension, ['xls','xlsx'])){ // chek if input file is valid
            $request->session()->flash('alert-danger', 'Archivo invalido');
            return Redirect::back(); 
        }
        
        if ($request->get('mode') == 'deleteAndAdd') {
            DB::table('data')->where('reporte', '=','densidad')->delete();
        }
        
        Excel::import(new DensidadImport, $request->file('import-file'));
        activity()->log('importo datos de densidad');
        Session::flash('alert-success','Datos importados con exito');        
        return Redirect::route('data.densidad.index');        
    }
    
    public function bulkDelete(Request $request)
    {
        $ids = $request->get('id','');
        if ($ids) {
            $ids = explode(",", $ids);
            DB::table('data')->whereIn('id', $ids)->delete();
            Session::flash('alert-success','Datos borrados con exito');
        }
        return Redirect::back();
    }
}

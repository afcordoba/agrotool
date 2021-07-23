<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\StatsReports;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::search()->paginate(15);
        return view('users.index', compact('request','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->except('_token','_method');
        $user = new User();
        if(!$user->isValid($input)){   
            $request->session()->flash('alert-danger', implode("\n", $user->message->all()));
            return Redirect::back()->withInput()->withErrors($user->message); 
        }

        if ($request->hasFile('image')) {
            $request->image->store('images/uploads','public');
            $input['image'] = $request->image->hashName();
        } 
        
        $user->create($input);
        activity()->log('creó al usuario '.$input['name']);
        $request->session()->flash('alert-success', 'Usuario creado con exito!');
        return Redirect::route('users.index');        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $tag = 'activity';
        $items = $this->getItems($user);
        $stats = StatsReports::getReportsByUserEmail($user);   
        return view('users.show', compact('user','tag','items','stats'));
    }
    
    private function getItems($user)
    {
        $actions = $user->actions->sortByDesc('created_at');
        $items = [];
        foreach ($actions as $action) {
            $action->humanDate = $action->created_at->diffForHumans(Carbon::now());
            $index = $action->created_at->toFormattedDateString();
            $items[$index][] = $action;
        }  
        return $items;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $tag = 'setting';
        $items = $this->getItems($user);
        return view('users.show', compact('user','tag','items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {        
        $tag = 'setting';
        $input = (is_null($request->get("password"))) ? 
                $request->only('name','email','image') : $request->except('_token','_method');

        if(!$user->isValid($input)){   
            $request->session()->flash('alert-danger', implode("\n", $user->message->all()));
            return Redirect::route('users.edit',$user);
        }

        if ($request->hasFile('image')) {
            $request->image->store('images/uploads','public');
            $input['image'] = $request->image->hashName();
        } 
        
        $user->update($input);
        activity()->log('actualizó al usuario '.$user->name);
        $items = $this->getItems($user);
        $request->session()->flash('alert-success', 'Datos editados con exito!');
        return view('users.show', compact('user','tag','items'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        activity()->log('eliminó al usuario '.$user->name);
        Session::flash('alert-success','Usuario borrado con exito');        
        return Redirect::route('users.index');
    }
    
    
    public function export(Request $request)
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}

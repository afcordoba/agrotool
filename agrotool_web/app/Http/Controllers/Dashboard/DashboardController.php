<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Data;
use Carbon\Carbon;
use DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $totalUsers = DB::table('users')->count('id');
        $totalData = DB::table('data')->count('id');
        $totalReports = DB::table('stats_reports')->sum('total');

        $totalVisits = DB::table('stats_visits')->distinct('ip')->count('id');
        return view('dashboard.index', compact(
                'request',
                'totalUsers',
                'totalData',
                'totalVisits',
                'totalReports'
        ));
    }
}

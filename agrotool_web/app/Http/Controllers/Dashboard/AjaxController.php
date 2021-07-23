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

class AjaxController extends Controller
{

    public function statsByReport(Request $request)
    {
        $stats = DB::table('stats_reports')
                     ->select(DB::raw('report, sum(total) as total'))
                     ->groupBy('report')
                     ->get();
        return $stats;
    }
    
    public function statsByUser(Request $request)
    {
        $stats = DB::table('stats_reports')
                     ->select(DB::raw('email, sum(total) as total'))
                     ->groupBy('email')
                     ->orderBy('total','desc')
                     ->limit(10)->get();
        return $stats;
    }    
}

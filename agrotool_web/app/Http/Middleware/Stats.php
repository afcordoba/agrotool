<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use DB;
use Auth;

class Stats
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $date = Carbon::now()->toDateString();
        $type = $request->get('type','none');
        $report = $request->get('report', 'none');
        
        if (Auth::guest()) {
            $email = $request->get('email','none');
            $user = User::firstOrCreate(['email' => $email], ['name' => $email, 'password' => md5(time())]);
        } else {
            $user = Auth::user();
        }
        activity()->causedBy($user)->log('Consulto reporte: '.$report);
        
        DB::statement("INSERT INTO stats_reports (date,email,type,report,total) "
                . "VALUES (?,?,?,?,1) "
                . "ON DUPLICATE KEY UPDATE total = total + 1", ([$date, $user->email, $type, $report]));
        
        return $next($request);
    }
}

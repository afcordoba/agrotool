<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class Visits
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
        $ip = $request->ip();
        DB::statement("INSERT INTO stats_visits (date, ip, visits) "
                . "VALUES (?,?,1) "
                . "ON DUPLICATE KEY UPDATE visits = visits + 1", ([$date, $ip]));
        
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use DB;

class Auth2
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        $auth = false;    
        if(isset($_COOKIE['wpe-auth'])) {
            $username = '';
            
            foreach($_COOKIE as $key => $value) {
                if (strpos($key, 'wordpress_logged_in_') !== false) {
                    $data = explode("|", $value);
                    $username = (isset($data[0])) ? $data[0] : '';
                }

            }

            if($username) {
                //$user = DB::table('wpdm_users')->where('user_nicename', '=', $username)->get();
                $user = DB::select("select * "
                        . "from wpdm_users as a inner join wpdm_usermeta as b "
                        . "on a.ID = b.user_id and b.meta_key = 'wpdm_capabilities' "
                        . "where a.user_login = '$username' limit 1");
                
                $meta  = (isset($user[0])) ? unserialize($user[0]->meta_value) : false;
                if ($meta) {
                    if(in_array('administrador', $meta)){
                        $auth = 'autorizado';
                    }
                }


            }

        } else {
            $dom = parse_url(request()->root());
            $host =  $dom['host'];
            if ($host != 'donmario.com' && $host != 'donmariodev.wpengine.com' && $host != 'www.donmario.com' ) {
                $auth = true;
            }
        }

        if (!$auth) {
            die("no autorizado");
        } else {    
            return $next($request);
        }
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redirect;

class CheckISDN
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
        $link = 'http://dangky.mobiedu.vn/api/msisdn.jsp?serviceId=30';

        $user = session()->get('_user');
        if (empty($user)) {
            return Redirect::away($link);
        }
        return $next($request);
    }
}

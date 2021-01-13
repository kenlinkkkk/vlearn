<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redirect;

class CheckClientLogin
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
        if (empty(session()->get('_user'))) {
            return Redirect::route('home.showLogin');
        }
        return $next($request);
    }
}

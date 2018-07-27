<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class isMgr
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
        if( Auth::check() && $request->user()->manager == 1 ){
            return redirect()->guest('home');
        }
        return $next($request);
    }
}

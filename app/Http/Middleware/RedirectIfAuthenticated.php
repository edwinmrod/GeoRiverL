<?php

namespace GeoRiver\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
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
	
	 if ($request->email == 'ed@mail.es____') {
            return redirect('/homeD');
			
        }
        if (Auth::guard($guard)->check()) {
     
	
            return redirect('/homeD');
        }

        return $next($request);
    }
}

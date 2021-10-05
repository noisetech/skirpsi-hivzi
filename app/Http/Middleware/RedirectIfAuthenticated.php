<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
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
        if (Auth::guard($guard)->check()) {
            if(Auth::user() && Auth::user()->role == 'admin'){
            return redirect()->route('dashboard.admin');
            }

            if(Auth::user() && Auth::user()->role == 'Pengelola Lapangan'){
                return redirect()->route('dashboard.pengelola');
                }

                if(Auth::user() && Auth::user()->role == 'Customer'){
                    return redirect()->route('dashboard.customer');
                    }

        }

        return $next($request);
    }
}

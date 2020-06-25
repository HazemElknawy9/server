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
        if (Auth::guard($guard)->check() && auth()->user()->hasRole('super_admin') || Auth::check() && auth()->user()->hasRole('admin')) {
            return redirect()->route('dashboard.welcome');
        } elseif (Auth::guard($guard)->check() && auth()->user()->hasRole('user'))
        {
            return redirect()->route('welcome');
        }else {
            return $next($request);
        }
    }
}

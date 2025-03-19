<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        
        if (Auth::guard($guards)->check() && Auth::user()->role->id == 1) 
        {
            return redirect()->route('admin.dashboard');
        } elseif (Auth::guard($guards)->check() && Auth::user()->role->id == 2)
        {
            return redirect()->route('student.dashboard');
        }else {
            return $next($request);
        }
    }
}

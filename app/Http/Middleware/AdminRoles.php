<?php

namespace App\Http\Middleware;

use Closure;

class AdminRoles
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
        if( auth()->check() ) {
            if( auth()->user()->hasRole('superadmin') || auth()->user()->hasRole('teacher') ) {
                return $next($request);
            }
            return redirect()->route('platform.browse.index');
        }
        return redirect()->route('landing.index');
    }
}

<?php

namespace App\Http\Middleware;

use Closure;

class StudentRoles
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
            if( auth()->user()->hasRole('student') ) {
                return $next($request);
            }
            return redirect()->route('admin.index');
        }
        return redirect()->route('landing.index');
    }
}

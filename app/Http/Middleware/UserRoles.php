<?php

namespace App\Http\Middleware;

use Closure;

class UserRoles
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
            if( auth()->user()->roles->first()->slug == 'student' ) {
                return $next($request);
            } else {
                return back();
            }
            return redirect()->route('browse.index');
        }
        
    }
}

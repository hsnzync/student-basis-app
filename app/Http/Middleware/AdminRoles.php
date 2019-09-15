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
            if( auth()->user()->roles->first()->slug == 'superadmin' ) {
                return $next($request);
            } else {
                return back();
            }
            return redirect()->route('admin.index');
        }
    }
}

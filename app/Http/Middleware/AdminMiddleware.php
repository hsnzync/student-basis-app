<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
        $user_role = auth()->user()->roles;

        foreach($user_role as $role) {
            if (auth()->user() &&  $role->id == 2) {
                return $next($request);
            }
        }

        return redirect('/dashboard');
    }
}
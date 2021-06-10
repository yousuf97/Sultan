<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $permitted_roles = ['super-admin', 'admin'];
        if (Auth::user() &&  Auth::user()->hasRole($permitted_roles)) {
            return $next($request);
        }

        //    return redirect('/')->with('error','You have not admin access');
        return redirect('/');
    }
}

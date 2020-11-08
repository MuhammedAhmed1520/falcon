<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class hospitalAuth
{

    public function handle($request, Closure $next, $guard = "hospital")
    {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->route('falcon-hospitalLogin');
            }
        }

        return $next($request);
    }
}

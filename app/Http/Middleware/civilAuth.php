<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class civilAuth
{

    public function handle($request, Closure $next, $guard = "civil")
    {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->route('falcon-civilLogin');
            }
        }

        return $next($request);
    }
}

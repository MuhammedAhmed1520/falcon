<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class agentOfficeAuth
{

    public function handle($request, Closure $next, $guard = "agent")
    {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->route('loginOfficeAgent');
            }
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ForceHttpProtocol
{

     public function handle($request, Closure $next) {

        if (!$request->secure()) { 
            return redirect('https://' . $request->getHost() . $request->getRequestUri());
        }

        return $next($request);
    }
}

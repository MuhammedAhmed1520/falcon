<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;

class LanguageMiddleware
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
        $lang = session()->get('current_lang') ?? app()->getLocale();
        app()->setLocale($lang);
        session(['current_lang',$lang]);
        return $next($request);
    }
}

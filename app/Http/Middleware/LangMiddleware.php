<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LangMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->has('mylocale') &&
            array_key_exists($request->session()->get('mylocale'), config('app.languages'))){
            app()->setLocale($request->session()->get('mylocale'));
        }else{
            app()->setLocale(config('app.locale'));
        }

        return $next($request);
    }
}

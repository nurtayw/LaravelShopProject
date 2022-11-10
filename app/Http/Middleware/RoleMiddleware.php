<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$rollnames)
    {
        if (Auth::check()) {
            foreach ($rollnames as $rollname) {
                if (Auth::user()->role->name == $rollname)
                    return $next($request);
            }
        } else
            return redirect()->route('login.form');
        return response()->view('errors.error404');
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class StoreStatus
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
        if (auth('store')->check() and !(auth('store')->user()->status?? 0)) {
            abort(403);
        }
        return $next($request);
    }
}

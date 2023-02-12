<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SanctumAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!auth('sanctum')->check()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Token not found, please login and try again',
            ], 401);
        }
        return $next($request);
    }
}

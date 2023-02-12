<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SanctumGuest
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
        if (auth('sanctum')->check()) {
            return response()->json([
                'status' => 'error',
                'message' => 'You are already logged in',
            ], 201);
        }
        return $next($request);
    }
}

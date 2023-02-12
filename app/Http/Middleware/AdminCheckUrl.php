<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use Closure;
use Illuminate\Http\Request;

class AdminCheckUrl
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
        $path = $request->path();
        $admin_url = auth('admin')->user()->url?? '';
        if ($admin_url == '') {
            return $next($request);
        }
        foreach ($admin_url->getAttributes() as $key => $value) {
            if (str_contains($path, $key)) {
                if ($value == null or $value == '') {
                    abort(403);
                }
            }
        }
        return $next($request);
    }
}

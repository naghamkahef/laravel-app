<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class GuardianMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!Auth::guard('guardian-api')->check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
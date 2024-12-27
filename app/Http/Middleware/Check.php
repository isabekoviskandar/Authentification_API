<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Check
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth('sanctum')->user();
        if ($user && ($user->role === 'admin' || $user->role === 'moderator')) {
            return $next($request);
        }

        return response()->json([
            'message' => 'Cannot perform this action',
        ], 403);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PaystackIPMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $allowedIps = [
            "52.31.139.75",
            "52.49.173.169",
            "52.214.14.220",
        ];
        
        if (!in_array($request->ip(), $allowedIps)) {
            return response()->json(['message' => 'Do not use this link, ever'], 404);
        }
        return $next($request);
    }
}

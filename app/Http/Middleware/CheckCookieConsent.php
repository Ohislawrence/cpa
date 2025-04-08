<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckCookieConsent
{
    public function handle(Request $request, Closure $next)
    {
        // Skip for API routes
        if ($request->is('api/*')) {
            return $next($request);
        }

        // Check if cookie consent exists
        if (!$request->hasCookie(config('cookies.cookie_name'))) {
            session(['show_cookie_notice' => true]);
        }

        return $next($request);
    }
}

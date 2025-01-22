<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Autoapproval
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $activeuser = auth()->user()->affiliatedetails::where('status', 'Pending')->first();

        if ($activeuser) {
            return to_route('affiliate.thankyouapproval'); 
        }
        return $next($request);
    }
}

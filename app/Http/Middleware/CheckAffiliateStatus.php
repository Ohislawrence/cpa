<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\AffiliateDetail;

class CheckAffiliateStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Ensure the user is authenticated
        if (Auth::check()) {
            // Get the authenticated user's affiliate details
            $affiliateDetail = AffiliateDetail::where('user_id', Auth::id())->first();

            // Check if affiliate details exist
            if ($affiliateDetail) {
                // Redirect back with messages based on status
                switch ($affiliateDetail->status) {
                    case 'Pending':
                        return redirect()->route('login.test')->with('message', 'Your application is pending approval.');
                    case 'Rejected':
                        return redirect()->route('login.test')->with('message', 'Your application has been rejected.');
                    case 'Active':
                        return $next($request);
                }
            }
        }

        // If no affiliate details, continue with the request
        return $next($request);
    }
}

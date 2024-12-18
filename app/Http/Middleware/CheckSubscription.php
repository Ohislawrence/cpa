<?php

namespace App\Http\Middleware;

use App\Models\Tenant;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Stancl\Tenancy\Facades\Tenancy;

class CheckSubscription
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Get the current tenant
        $tenant = tenant();
        
        //dd($tenant);

        if (!$tenant) {
            // If no tenant is identified, deny access.
            return response()->json(['error' => 'Tenant not found.'], Response::HTTP_FORBIDDEN);
        }

        // Fetch the tenant's subscription
        $subscription = $tenant->subscription; 
        //dd($subscription);

        if (!$subscription) {
            // No subscription exists
            return response()->json(['error' => 'Subscription not found.'], Response::HTTP_FORBIDDEN);
        }
        $currentDate = now();
        // Check subscription status
        if ($subscription->status !== 'active' && $currentDate->lt($subscription->trial_ends_at)) {
            return response()->json(['error' => 'Free usage.'], Response::HTTP_PAYMENT_REQUIRED);
        }

        // Check if subscription is within valid dates
        
        if ($currentDate->lt($subscription->start_date) || $currentDate->gt($subscription->end_date) && $subscription->status !== 'active') {
            return response()->json(['error' => 'Subscription has expired or is not yet active.'], Response::HTTP_PAYMENT_REQUIRED);
        }
        return $next($request);
    }
}

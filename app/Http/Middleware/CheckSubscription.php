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
            return response()->json(['error' => 'Account not found. Kindly Reach out to us'], Response::HTTP_FORBIDDEN);
        }

        // Fetch the tenant's subscription
        $subscription = $tenant->subscriptiontracker; 
        //dd($subscription->plan->id);

        if (!$subscription) {
            // No subscription exists
            return response()->json(['error' => 'Subscription not found. Kindly Reach out to us.'], Response::HTTP_FORBIDDEN);
        }
        $currentDate = now();
        // Check subscription status
        if ($subscription->status !== 'active' && $currentDate->lt($subscription->trial_ends_at)) {
            return response()->json(['error' => 'Free usage.'], Response::HTTP_PAYMENT_REQUIRED);
        }

        // Check if subscription is within valid dates
        
        if ($currentDate->lt($subscription->start_date) || $currentDate->gt($subscription->end_date)) {
            if (auth()->user()->hasRole('network')){
                return redirect(route('admin.plan.active'));
            }
            elseif(auth()->user()->hasRole('affiliate')){
                return redirect(route('affiliate.account.pending'));
            }
            elseif(auth()->user()->hasRole('merchant')){
                return redirect(route('merchant.plan.active'));
            }
            //return redirect()->route("merchant.plan.active"); ; //response()->json(['error' => 'Subscription has expired or is not yet active.'], Response::HTTP_PAYMENT_REQUIRED);
        }
        return $next($request);
    }
}

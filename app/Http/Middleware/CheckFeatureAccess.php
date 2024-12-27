<?php

namespace App\Http\Middleware;

use App\Models\Planfeature;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckFeatureAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $feature): Response
    {
        // Get the current tenant
        $tenant = tenant();
        $subscription = $tenant->subscription; 

        // get the features for the plan tenant is on
        //$planfeatures = Planfeature::where('plan_id',$subscription->plan->id)->pluck('feature_id')->unique();
        $planfeatures = Planfeature::where('plan_id',$subscription->plan->id)
                        ->where('feature_id', $feature)->where('is_included', 1)->exists();
        //$planfeatures =$planfeatures->toArray();

        //check if feature is in the array
        
        if ($planfeatures == false) {
            abort(403, 'This feature is not available on your current plan.');
        }
        return $next($request);
    }
}

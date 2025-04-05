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
    $owner = tenancy()->tenant->owner();
    
    $planID = match (true) {
        $owner->subscribed('pro') => 1,
        $owner->subscribed('leader') => 2,
        $owner->subscribed('network') => 3,
        default => null,
    };

    if (is_null($planID)) {
        abort(403, 'You do not have an active subscription yet.');
    }

    $hasFeature = Planfeature::where('plan_id', $planID)
        ->where('feature_id', $feature)
        ->where('is_included', 1)
        ->exists();

    if (!$hasFeature) {
        abort(403, 'This feature is not available on your current plan.');
    }

    return $next($request);
}
}

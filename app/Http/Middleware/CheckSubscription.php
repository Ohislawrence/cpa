<?php

namespace App\Http\Middleware;

use App\Models\Tenant;
use App\Models\User;
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
        
        if (auth()->user()->hasRole('network')){
            $userTenant = User::on('mysql')->where('email', auth()->user()->email)->first();
            // Check if the user is authenticated and has an active subscription
            if (!$userTenant || !$userTenant->subscribed('lower plan - pro')) {
                return redirect(route('admin.plan.active'));
            }
            
        }
        elseif(auth()->user()->hasRole('affiliate')){
            $owner = tenancy()->tenant->owner();
            if($owner->onTrial()){
                return $next($request);
            }
            if (!$owner || !$owner->subscribed('pro')) {
                return redirect(route('affiliate.account.pending'));
            } 
            
        }
        elseif(auth()->user()->hasRole('merchant')){
            $owner = tenancy()->tenant->owner();
            // Check if the user is authenticated and has an active subscription
            if($owner->onTrial()){
                return $next($request);
            }
            if (!$owner || !$owner->subscribed('pro')) {
                return redirect(route('merchant.plan.active'));
            }  
        }
        return $next($request);
    }
}

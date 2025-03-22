<?php

namespace App\Http\Controllers\Agency;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Subscriptiontracker;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Stancl\Tenancy\Facades\Tenancy;


class SubscribeController extends Controller
{
    
    public function subscribe(){
        $plans = Plan::all();
        $tenantUser = User::on('mysql')->where('email', auth()->user()->email)->first();
        $subscription = Subscriptiontracker::where('user_id', $tenantUser->id)->first();
        $currentDate = Carbon::now();
        //dd($currentDate->lt($subscription->end_date));
        return view("agency.pricing.plan", compact("plans", "subscription", "currentDate"));
    }

    public function nosubaffiliate(){
        return view('affiliate.pending');
    }
}

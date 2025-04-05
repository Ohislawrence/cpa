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
        $owner = tenancy()->tenant->owner();
        $currentDate = Carbon::now();
        return view("agency.pricing.plan", compact("plans", "currentDate","owner"));
    }

    public function nosubaffiliate(){
        return view('affiliate.pending');
    }
}

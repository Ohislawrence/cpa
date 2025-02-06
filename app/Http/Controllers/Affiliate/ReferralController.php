<?php

namespace App\Http\Controllers\Affiliate;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReferralController extends Controller
{
    public function index()
    {
        $refURL = url('signup/affiliate').'?refid='.Auth()->user()->affiliatedetails->referral_id;
        return view('affiliate.referral', compact('refURL'));
    }
}

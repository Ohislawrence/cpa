<?php

namespace App\Http\Controllers\Affiliate;

use App\Http\Controllers\Controller;
use App\Mail\WelcomeEmail;
use App\Mail\WelcomeEmailAgency;
use App\Models\Affiliatedetail;
use App\Models\Agencydetails;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegistrationController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        return view('frontpages.affiliateregistration', compact('countries'));
    }

    public function advertiser()
    {
        return view('agency.signup');
    }

    public function postagency(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole('affiliate');
        
        Agencydetails::create([
        'user_id' => $user->id,
        'active' => 0,	
        'companyname' => $request->companyname,	
        'brandurl' => $request->brandurl,	
        'brandaddress' => $request->brandaddress,	
        'city' => $request->city,	
        'country' => $request->country,
        'region' => 'na',
        'phonenumber' => $request->phonenumber,
        'brandname' => $request->brandname,
        'branddesc' => $request->branddesc,
        'brandproductlandingurl' => $request->brandproductlandingurl,
        'category_id' => $request->category_id,
        'brandtargetgeos' => $request->brandtargetgeos,
        'brandpreferredpayouttype' => 'na',
        'brandpaymenyterm' => 'na',
        'brandinstantmessager' => 'telegram',
        'brandinstantmessageid' => $request->brandinstantmessageid,
        'brandinterestedtraffic' => 'na',
        'brandmonthlybudget' => $request->brandmonthlybudget,
        'brandtracking' => $request->brandtracking,
        'note' => $request->note,
    ]);

        Mail::to($user->email)->queue(new WelcomeEmailAgency($user));

        return back()->with('message','Your request has been recieved, we will contact you shortly, Thank you.');
    }


    public function postaffiliate(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string',
            'country' => 'required',
            'region' => 'required',
        ]);
        if($request->toc != 1)
        {
            return back()->with('message','You did not accept the Terms and Conditions');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole('affiliate');
        //active logic
        
        Affiliatedetail::create([
        'user_id' => $user->id,
        'active' => 0,	
        'city' => $request->region,	
        'country' => $request->country,	
        'region' => $request->region,
        'phonenumber' => 'edit',
        'instantmessageid' => 'unused',
        'referral_id' => $this->generateUniqueCode(),
        'referred_by' => $request->refID ?? null,
    ]);

        Mail::to($user->email)->queue(new WelcomeEmail($user));

        return view('frontpages.affiliateCreated');
    }

    public function generateUniqueCode()
    {
        do {
            $code = random_int(10000000, 99999999);
        } while (Affiliatedetail::where("referral_id", "=", $code)->first());

        return $code;
    }
}

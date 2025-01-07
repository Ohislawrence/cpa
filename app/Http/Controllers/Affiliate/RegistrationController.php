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
use Illuminate\Support\Str;

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
        
    }


    public function postaffiliate(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email',
            'country' => 'required',
            'region' => 'required',
        ]);
        if($request->toc != 1)
        {
            return back()->with('message','You did not accept the Terms and Conditions');
        }

        $password = Str::password(9, true, true, false, false);
        $password_hash = Hash::make($password);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password_hash,
        ]);

        $user->assignRole('affiliate');

        //active logic
        $activeSetting = \App\Models\Setting::where('key','affiliate_auto_approval')->value('value');
        if( $activeSetting  == 1){
            $activate = 1;
        }else{
            $activate =0;
        }
        
        Affiliatedetail::create([
        'user_id' => $user->id,
        'active' => $activate,	
        'city' => $request->region,	
        'country' => $request->country,	
        'region' => $request->region,
        'phonenumber' => 'edit',
        'instantmessageid' => 'unused',
        'referral_id' => $this->generateUniqueCode(),
        'referred_by' => $request->refID ?? null,
    ]);

        
        Mail::to($user->email)->queue(new WelcomeEmail($user,$password,$activeSetting));   
        return back()->with('message','Your account has been created, check your email to sign in.');
    }

    public function generateUniqueCode()
    {
        do {
            $code = random_int(10000000, 99999999);
        } while (Affiliatedetail::where("referral_id", "=", $code)->first());

        return $code;
    }
}

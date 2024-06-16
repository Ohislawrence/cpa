<?php

namespace App\Http\Controllers\Affiliate;

use App\Http\Controllers\Controller;
use App\Models\Agencydetails;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('affiliate.signup');
    }

    public function advertiser()
    {
        return view('agency.signup');
    }

    public function postAdvertiser(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:Users,email',
            'password' => 'required|string',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole('agency');
        
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

        return back()->with('message','Your request has been recieved, we will contact you shortly, Thank you.');
    }
}

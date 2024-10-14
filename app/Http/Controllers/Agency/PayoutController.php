<?php

namespace App\Http\Controllers\Agency;

use App\Http\Controllers\Controller;
use App\Models\Agencydetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PayoutController extends Controller
{
    public function index()
    {
        return view('agency.payout.viewrequest');
    }

    public function options()
    {
        return view('agency.payout.payoutoption');
    }

    public function storePaypalDetails(Request $request)
    {
        $request->validate([
            'client_id' => 'required|string',
            'secret' => 'required|string',
            'email' => 'required|email'
        ]);

        $user = Auth::user();

        // Check if user already has PayPal credentials
        $credential = Agencydetails::updateOrCreate(
            ['user_id' => $user->id],
            ['client_id' => $request->client_id, 'secret' => $request->secret, 'paypal_email' => $request->paypalemail]
        );

        return back()->with('success', 'PayPal credentials saved successfully.');
    }
}

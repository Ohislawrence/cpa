<?php

namespace App\Http\Controllers\Agency;

use App\Http\Controllers\Controller;
use App\Models\Requestpayment;
use Illuminate\Http\Request;
use App\Services\PayPalService;

class MassPaymentController extends Controller
{
    protected $paypalService;

    public function __construct(PayPalService $paypalService)
    {
        $this->paypalService = $paypalService;
    }

    public function processMassPayment(Request $request)
    {
        $merchant = auth()->user();

        if (!$merchant->paypal_email) {
            return back()->withErrors('Please set up your PayPal email first.');
        }

        // Fetch pending payment requests
        $paymentRequests = Requestpayment::with('affiliate')
            ->where('status', 'pending')
            ->get();

        // Prepare payment data
        $payments = $paymentRequests->map(function ($request) {
            return [
                'affiliate_paypal_email' => $request->affiliate->paypal_email,
                'amount' => $request->amount,
            ];
        })->toArray();

        try {
            $response = $this->paypalService->makeMassPayment($merchant->paypal_email, $payments);

            // Update payment request status
            Requestpayment::whereIn('id', $paymentRequests->pluck('id'))->update(['status' => 'paid']);

            return back()->with('success', 'Mass payment processed successfully.');
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }
}

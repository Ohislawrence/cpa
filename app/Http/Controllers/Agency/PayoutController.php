<?php

namespace App\Http\Controllers\Agency;

use App\Http\Controllers\Controller;
use App\Models\Affiliatepayout;
use App\Models\Agencydetails;
use App\Models\Click;
use App\Models\Currency;
use App\Models\Payoutoption;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DataTables;
use Yajra\DataTables\Contracts\DataTable;

class PayoutController extends Controller
{
    public function index()
    {
        $payoutMethodId = settings()->get('payout_methods');
        $payoutType = Payoutoption::where('id', $payoutMethodId)->value('processor') ?? 'not set';

        $info = 'Note that you are processing this payment with '.$payoutType;
        $readonly = '';

        if (empty($payoutMethodId)) {
            $info = 'Go to Configurations and set the Payout option';
            $readonly = 'readonly';
        } 
        $currency = Currency::where('id', settings()->get('default_currency'))->first();
        return view('agency.payout.viewpayouts', compact('info', 'readonly','currency'));
    }

    public function options()
    {
        $agencyDetails = Agencydetails::where('user_id', Auth::id())->first();
        $payoutMethodId = settings()->get('payout_methods');
        $payoutType = Payoutoption::where('id', $payoutMethodId)->value('processor') ?? 'not set';
        return view('agency.payout.payoutoption', compact('payoutType','agencyDetails'));
    }

    public function storePaypalDetails(Request $request)
    {
        $request->validate([
            'client_id' => 'required|string',
            'secret' => 'required|string',
            'email' => 'required|email',
            'webhookID' => 'required|string',
        ]);

        $user = Auth::user();

        // Check if user already has PayPal credentials
        $credential = Agencydetails::updateOrCreate(
            ['user_id' => $user->id],
            ['client_id' => $request->client_id, 
            'secret' => $request->secret, 
            'paypal_email' => $request->email, 
            'paypal_webhook_id' =>$request->webhookID]
        );

        return back()->with('message', 'PayPal credentials saved successfully.');
    }

    public function storeWiseDetails(Request $request)
    {
        $request->validate([
            'client_id' => 'required|string',
            'secret' => 'required|string',
            'email' => 'required|email',
            'webhookID' => 'required|string',
        ]);

        $user = Auth::user();

        // Check if user already has PayPal credentials
        $credential = Agencydetails::updateOrCreate(
            ['user_id' => $user->id],
            ['client_id' => $request->client_id, 
            'secret' => $request->secret, 
            'paypal_email' => $request->email, 
            'paypal_webhook_id' =>$request->webhookID]
        );

        return back()->with('message', 'Wise credentials saved successfully.');
    }

    public function storePayoneerDetails(Request $request)
    {
        $request->validate([
            'client_id' => 'required|string',
            'secret' => 'required|string',
            'email' => 'required|email',
            'webhookID' => 'required|string',
        ]);

        $user = Auth::user();

        // Check if user already has PayPal credentials
        $credential = Agencydetails::updateOrCreate(
            ['user_id' => $user->id],
            ['client_id' => $request->client_id, 
            'secret' => $request->secret, 
            'paypal_email' => $request->email, 
            'paypal_webhook_id' =>$request->webhookID]
        );

        return back()->with('message', 'Payoneer credentials saved successfully.');
    }

    public function unpaidcommissions()
    {
        $payoutMethodId = settings()->get('payout_methods');
        $payoutType = Payoutoption::where('id', $payoutMethodId)->value('processor') ?? 'not set';

        $info = 'Note that you are processing this payment with '.$payoutType;
        $readonly = '';

        if (empty($payoutMethodId)) {
            $info = 'Go to Configurations and set the Payout option';
            $readonly = 'readonly';
        } 
        $currency = Currency::where('id', settings()->get('default_currency'))->first();
        return view('agency.payout.unpaidcommissions', compact('info', 'readonly','currency'));
    }

    public function getallPayout(Request $request)
    {
        if ($request->ajax()) {
            $data = Affiliatepayout::latest(); // No need for ->get(), let DataTables handle it

            return Datatables::of($data)
                ->addColumn('date', function($row) {
                    return $row->updated_at ? Carbon::parse($row->updated_at)->format('d/m/Y') : 'N/A';
                })
                ->addColumn('amount', function($row) {
                    return number_format($row->amount, 2);
                })
                ->addColumn('name', function($row) {
                    return optional($row->user)->name ?? 'N/A'; // Prevents errors if user is missing
                })
                ->rawColumns(['date', 'amount', 'name'])
                ->make(true);
        }
    }

    public function getallunpaidcommissionsTable(Request $request)
    {
        if ($request->ajax()) {
            // Group by user_id and sum the earned column
            $data = Click::where('status', 'Approved')
                ->selectRaw('user_id, SUM(earned) as total_earned, MAX(updated_at) as last_updated')
                ->groupBy('user_id')
                ->latest('last_updated');

            return Datatables::of($data)
                ->addColumn('date', function($row) {
                    return $row->last_updated ? Carbon::parse($row->last_updated)->format('d/m/Y') : 'N/A';
                })
                ->addColumn('name', function($row) {
                    return optional(User::find($row->user_id))->name ?? 'N/A'; // Get user's name
                })
                ->addColumn('commission', function($row) {
                    $refcomm = $row->where('refstatus','!=','Paid')->where('referral', $row->user_id )->sum('refcommission');
                    return number_format($row->total_earned + $refcomm, 2); // Display total earned
                })
                ->rawColumns(['date', 'commission', 'name'])
                ->make(true);
        }
    }


}

<?php

namespace App\Http\Controllers\Affiliate;

use App\Http\Controllers\Controller;
use App\Models\Affiliatedetail;
use App\Models\Click;
use App\Models\Currency;
use App\Models\Payoutoption;
use App\Models\Requestpayment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DataTables;


class PaymentController extends Controller
{
    public function index()
    {
        $clicked = Click::where('user_id', Auth::user()->id);
        $payLastMonth = $clicked->where('created_at','>=', Carbon::now()->subMonth())->get();
        $payThisMonth = $clicked->where('created_at','>=', Carbon::now()->startOfMonth())->get(); 
        $payYesterday = $clicked->where('created_at','>=', Carbon::yesterday())->get(); 
        $payToday = $clicked->where('created_at','>=', Carbon::today())->get();

        $earnedLastMonth =0;
        $earnedThisMonth = 0;
        $earnedYesterday = 0;
        $earnedToday = 0;
        
        foreach ($payLastMonth as $key => $value) {
            $earnedLastMonth += $value->earned;
        }
        foreach ($payThisMonth as $key => $value) {
            $earnedThisMonth += $value->earned;
        }
        foreach ($payYesterday as $key => $value) {
            $earnedYesterday += $value->earned;
        }
        foreach ($payToday as $key => $value) {
            $earnedToday += $value->earned;
        }
        $currency = Currency::where('id', settings()->get('default_currency'))->first();
        
        $userDetails = Affiliatedetail::where('user_id', Auth::id())
            ->select('payoneer_ID', 'paypal_email', 'wise_email')
            ->first();

        $payoutMethodId = settings()->get('payout_methods');
        $payoutType = Payoutoption::where('id', $payoutMethodId)->value('processor');

        $info = 'Enter the amount you would like to request!';
        $readonly = '';

        if ($payoutType === 'Payoneer' && empty($userDetails?->payoneer_ID)) {
            $info = 'Kindly go to your profile page and enter your Payoneer details.';
            $readonly = 'readonly';
        } elseif ($payoutType === 'Wise' && empty($userDetails?->wise_email)) {
            $info = 'Kindly go to your profile page and enter your Wise email.';
            $readonly = 'readonly';
        } elseif ($payoutType === 'Paypal' && empty($userDetails?->paypal_email)) {
            $info = 'Kindly go to your profile page and enter your PayPal email.';
            $readonly = 'readonly';
        }

        return view('affiliate.payments' , compact('earnedThisMonth','earnedYesterday','earnedToday', 'earnedLastMonth','currency','info','readonly'));
    }

    public function getpaymentdata(Request $request)
    {
        if ($request->ajax()) {
            $data = Requestpayment::where('user_id', Auth::user()->id)->get();

            return Datatables::of($data)
            ->addColumn('date', function($row){
                $date = Carbon::createFromFormat('Y-m-d H:i:s', $row->updated_at)->format('d/m/Y');
                return $date;
            })
            ->rawColumns(['date'])
                ->make(true);
        }

    }

    public function requestpayment(Request $request)
    {
        $this->validate($request, [
            'amount' => 'required|numeric',
        ]);

        $reqAmount = $request->amount;
        $minimumPayout = settings()->get('minimum_payout_amount') ?? 100;
        $currency = Currency::where('id', settings()->get('default_currency'))->first();

        if(Auth::user()->balanceFloat >= $reqAmount && $reqAmount>=$minimumPayout )
        {
            Auth::user()->withdrawFloat($reqAmount, ['description' => 'payment request']);

            Requestpayment::create([
                'amount' => $reqAmount,
                'user_id' => Auth()->user()->id,
                'status' => 'Request',
                'number' => $this->generateUniqueCode(),
                'method' => 'PayPal'
            ]);
            
            return back()->with('message', 'Request sent');
        }elseif($reqAmount<$minimumPayout){
            return back()->with('message', 'You can not request less than '.$currency->symbol.'' .$minimumPayout);
        }elseif(Auth::user()->balanceFloat<$minimumPayout){
            return back()->with('message', 'Your current balance is less than '.$currency->symbol.'' .$minimumPayout );
        }
        

        
    }

    public function generateUniqueCode()
    {
        do {
            $code = random_int(10000000, 99999999);
        } while (Requestpayment::where("number", "=", $code)->first());

        return $code;
    }
}

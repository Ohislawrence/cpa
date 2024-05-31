<?php

namespace App\Http\Controllers\Affiliate;

use App\Http\Controllers\Controller;
use App\Models\Click;
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
        return view('affiliate.payments' , compact('earnedThisMonth','earnedYesterday','earnedToday', 'earnedLastMonth'));
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
            'amount' => 'required|numeric|min:2',
        ]);

        $reqAmount = $request->amount;

        if(Auth::user()->balanceFloat >= $reqAmount && $reqAmount>=100 )
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
        }else{
            return back()->with('message', 'Check your request and balance and try again.');
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

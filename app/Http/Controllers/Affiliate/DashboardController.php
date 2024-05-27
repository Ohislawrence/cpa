<?php

namespace App\Http\Controllers\Affiliate;

use App\Http\Controllers\Controller;
use App\Models\Click;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DataTables;

class DashboardController extends Controller
{
    public function dashboardone()
    {
        $clicked = Click::where('user_id', Auth::user()->id);
        $payThisMonth = $clicked->where('created_at','>=', Carbon::now()->startOfMonth())->get(); 
        $payYesterday = $clicked->where('created_at','>=', Carbon::yesterday())->get(); 
        $payToday = $clicked->where('created_at','>=', Carbon::today())->get();

        $earnedThisMonth = 0;
        $earnedYesterday = 0;
        $earnedToday = 0;
        
        foreach ($payThisMonth as $key => $value) {
            $earnedThisMonth += $value->earned;
        }
        foreach ($payYesterday as $key => $value) {
            $earnedYesterday += $value->earned;
        }
        foreach ($payToday as $key => $value) {
            $earnedToday += $value->earned;
        }
        return view('affiliate.dashboard', compact('earnedThisMonth','earnedYesterday','earnedToday'));
    }

    public function dashboardtwo()
    {
        return view('affiliate.dashboard2');
    }

    public function getUserClicks(Request $request)
    {
        if ($request->ajax()) {
            $data = Click::where('user_id', Auth::user()->id)->select("id" ,
            DB::raw("(count(clickID)) as total_clicks"),
            DB::raw("(sum(earned)) as payout"),
            DB::raw("(sum(conversion)) as conversions"),
            DB::raw("(DATE_FORMAT(created_at, '%d-%m-%Y')) as my_date")
            )
            ->orderBy('created_at')
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%d-%m-%Y')"))
            ->get();

            return Datatables::of($data)
                    ->addColumn('epc', function($row){
                        if($row->total_clicks == 0)
                        {
                            return 0;
                        }else{
                        $epc = $row->payout/$row->total_clicks;
                        return round($epc,2,PHP_ROUND_HALF_DOWN);
                        }
                    
                    })
                    ->addColumn('cpa', function($row){
                        if($row->conversions == 0)
                        {
                            return 0;
                        }else{
                            $cpa = $row->payout/$row->conversions;
                            return round($cpa,2,PHP_ROUND_HALF_DOWN);
                        }
                        
                    })
                    ->rawColumns(['cpa','epc'])
                ->make(true);
        }
    }
}

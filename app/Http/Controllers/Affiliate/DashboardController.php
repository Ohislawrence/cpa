<?php

namespace App\Http\Controllers\Affiliate;

use App\Charts\AffiliateStats;
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

    public function dashboardtwo(Request $request, AffiliateStats $chart)
    {

        // Default timeframe is last 7 days
        $timeframe = $request->input('timeframe', 7);


        $clicks = Click::where('user_id', Auth::user()->id)->where('created_at','>=', Carbon::now()->subDays($timeframe));
        //dd($clicks);
        if( is_null($clicks)){
            $clicksthisMonth= 0;
            $leads = 0;
            $earned = 0;
            $epc = 0;
        }else{
            $clicksthisMonth= $clicks->get();
            $leads = $clicks->where('conversion', 1)->get();
            $earned = $clicks->where('earned','>', 0)->get();
            $epc = ($clicksthisMonth->count() != 0) ? round(($earned->sum('earned'))/($clicksthisMonth->count()) ,2,PHP_ROUND_HALF_DOWN) : 0;
        }



        // Validate timeframe to be either 7, 30, or 90 days
        if (!in_array($timeframe, [7, 30, 90])) {
            $timeframe = 7;
        }

        $chart = $chart->build($timeframe);
        return view('affiliate.dashboard2', compact('chart', 'timeframe', 'clicksthisMonth','leads','earned','epc'));
    }



    public function getUserClicks(Request $request)
    {
        if ($request->ajax()) {
            $data = Click::where('user_id', Auth::user()->id)
            ->select(
                DB::raw("null as id"), // Use null or aggregate this value meaningfully
                DB::raw("count(clickID) as total_clicks"),
                DB::raw("sum(earned) as payout"),
                DB::raw("sum(conversion) as conversions"),
                DB::raw("DATE_FORMAT(created_at, '%d-%m-%Y') as my_date")
            )
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%d-%m-%Y')"))
            ->orderBy(DB::raw("MIN(created_at)")) // Use MIN or MAX to order within grouped data
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

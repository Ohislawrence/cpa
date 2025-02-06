<?php

namespace App\Http\Controllers\Agency;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Click;
use App\Models\Configuration;
use App\Models\Currency;
use App\Models\Offer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DataTables;

class DashboardController extends Controller
{
    public function index()
    {
        $clicks = DB::table('clicks');

        //clicks count
        $clicksToday = $clicks->whereDate('created_at', now()->toDateString())->count();
        $clicksYesterday = $clicks->whereDate('created_at', now()->subDay()->toDateString())->count();
        $clicksweek_to_date = $clicks->whereBetween('created_at', [now()->startOfWeek(), now()])->count();
        $clicksmonth_to_date = $clicks->whereBetween('created_at', [now()->startOfMonth(), now()])->count();

        //earned
        $earnedtoday = $clicks
        ->whereDate('created_at', now()->toDateString())
        ->where('status', 'Approved')
        ->sum('earned');

        $earnedyesterday = $clicks
            ->whereDate('created_at', now()->subDay()->toDateString())
            ->where('status', 'Approved')
            ->sum('earned');

        $earnedweek_to_date = $clicks
            ->whereBetween('created_at', [now()->startOfWeek(), now()])
            ->where('status', 'Approved')
            ->sum('earned');

        $earnedmonth_to_date = $clicks
            ->whereBetween('created_at', [now()->startOfMonth(), now()])
            ->where('status', 'Approved')
            ->sum('earned');


        //EPC
        $todayEPC = $clicksToday > 0 ? $earnedtoday / $clicksToday : 0;
        $yesterdayEPC = $clicksYesterday > 0 ? $earnedyesterday / $clicksYesterday : 0;
        $weekToDateEPC = $clicksweek_to_date > 0 ? $earnedweek_to_date / $clicksweek_to_date : 0;
        $monthToDateEPC = $clicksmonth_to_date > 0 ? $earnedmonth_to_date / $clicksmonth_to_date : 0;

        //currency
        $currency = Currency::where('id', settings()->get('default_currency'))->first()->symbol;
        

        return view('agency.dashboard', compact('clicksToday',
                                                'clicksYesterday', 
                                                'clicksweek_to_date', 
                                                'clicksmonth_to_date',
                                                'earnedmonth_to_date',
                                                'earnedweek_to_date',
                                                'earnedyesterday',
                                                'earnedtoday',
                                                'todayEPC',
                                                'yesterdayEPC',
                                                'weekToDateEPC',
                                                'monthToDateEPC',
                                                'currency'
                                            ));

    }

    public function topcampaignsDash(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('clicks')
            ->whereBetween('created_at', [now()->startOfMonth(), now()])
            ->select('offer_id', DB::raw('COUNT(id) as clicks'))
            ->groupBy('offer_id')
            ->orderByDesc('clicks')
            ->limit(10)
            ->get();
            //dd($data);
            return Datatables::of($data)

                ->addColumn('action', function($row){
                    $actionBtn = '<a href="campaign/details/1/view" class="edit btn btn-primary btn-sm">View</a>';
                    return $actionBtn;
                })
                ->addColumn('offerName', function($row){
                    $id_offer = $row->offer_id;
                    $offerName = Offer::where('offerid', $id_offer )->first()->name;
                    return $offerName;
                })
                ->addColumn('clickNumber', function($row){
                    $clickNumber = $row->clicks;
                    return $clickNumber;

                })
                ->rawColumns(['action','offerName', 'clickNumber'])
                ->make(true);
        }
    }
}

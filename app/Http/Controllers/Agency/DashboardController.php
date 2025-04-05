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
        
        
        $now = now();
        $today = $now->toDateString();
        $yesterday = $now->copy()->subDay()->toDateString();
        $startOfWeek = $now->copy()->startOfWeek();
        $startOfMonth = $now->copy()->startOfMonth();

        // Click counts
        $clicks = Click::selectRaw("
            COUNT(CASE WHEN DATE(created_at) = ? THEN 1 END) as clicks_today,
            COUNT(CASE WHEN DATE(created_at) = ? THEN 1 END) as clicks_yesterday,
            COUNT(CASE WHEN created_at BETWEEN ? AND ? THEN 1 END) as clicks_week_to_date,
            COUNT(CASE WHEN created_at BETWEEN ? AND ? THEN 1 END) as clicks_month_to_date
        ", [$today, $yesterday, $startOfWeek, $now, $startOfMonth, $now])->first();

        // Earned amounts
        $earned = Click::selectRaw("
            SUM(CASE WHEN DATE(created_at) = ? AND status = 'Approved' THEN cost END) as earned_today,
            SUM(CASE WHEN DATE(created_at) = ? AND status = 'Approved' THEN cost END) as earned_yesterday,
            SUM(CASE WHEN created_at BETWEEN ? AND ? AND status = 'Approved' THEN cost END) as earned_week_to_date,
            SUM(CASE WHEN created_at BETWEEN ? AND ? AND status = 'Approved' THEN cost END) as earned_month_to_date
        ", [$today, $yesterday, $startOfWeek, $now, $startOfMonth, $now])->first();

        $clicksToday = $clicks->clicks_today;
        $clicksYesterday = $clicks->clicks_yesterday;
        $clicksweek_to_date = $clicks->clicks_week_to_date;
        $clicksmonth_to_date = $clicks->clicks_month_to_date;

        $earnedtoday = $earned->earned_today;
        $earnedyesterday = $earned->earned_yesterday;
        $earnedweek_to_date = $earned->earned_week_to_date;
        $earnedmonth_to_date = $earned->earned_month_to_date;


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

                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="reports?start_date=' . now()->startOfMonth()->format('Y-m-d') . '&end_date=' . now()->format('Y-m-d') . '&campaign_id=' . $row->offer_id . '" class="edit btn btn-primary btn-sm">View</a>';
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

<?php

namespace App\Http\Controllers\Affiliate;

use App\Charts\AffiliateStats;
use App\Http\Controllers\Controller;
use App\Models\Click;
use App\Models\Currency;
use App\Models\Offer;
use Illuminate\Http\Request;
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
        $userId = Auth::user()->id;

        // Click counts
        $clicks = Click::where('user_id', $userId)->selectRaw("
            COUNT(CASE WHEN DATE(created_at) = ? THEN 1 END) as clicks_today,
            COUNT(CASE WHEN DATE(created_at) = ? THEN 1 END) as clicks_yesterday,
            COUNT(CASE WHEN created_at BETWEEN ? AND ? THEN 1 END) as clicks_week_to_date,
            COUNT(CASE WHEN created_at BETWEEN ? AND ? THEN 1 END) as clicks_month_to_date
        ", [$today, $yesterday, $startOfWeek, $now, $startOfMonth, $now])->first();

        // Earned amounts
        $earned = Click::where('user_id', $userId)->selectRaw("
            SUM(CASE WHEN DATE(created_at) = ? AND status = 'Approved' THEN earned END) as earned_today,
            SUM(CASE WHEN DATE(created_at) = ? AND status = 'Approved' THEN earned END) as earned_yesterday,
            SUM(CASE WHEN created_at BETWEEN ? AND ? AND status = 'Approved' THEN earned END) as earned_week_to_date,
            SUM(CASE WHEN created_at BETWEEN ? AND ? AND status = 'Approved' THEN earned END) as earned_month_to_date
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

        $user = auth()->user()->load(['clicks' => function ($query) {
            $query->select('user_id', 'status', 'earned', 'conversion', 'refcommission')
                  ->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()]);
        }]);

        $referralId = auth()->user()->id;

        $referralStats = DB::table('clicks')
            ->where('referral', $referralId)
            ->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
            ->selectRaw("
                SUM(CASE WHEN status IN ('Approved', 'Paid') THEN refcommission ELSE 0 END) as refCommissionsEarned,
                SUM(CASE WHEN refstatus = 'Paid' THEN refcommission ELSE 0 END) as refCommissionsPaid,
                SUM(CASE WHEN status IN ('Refunded', 'Chargeback') THEN refcommission ELSE 0 END) as refCommissionsRefund
            ")
            ->first();

        // Extract values
        $refCommissionsEarned = $referralStats->refCommissionsEarned ?? 0;
        $refCommissionsPaid = $referralStats->refCommissionsPaid ?? 0;
        $refCommissionsRefund = $referralStats->refCommissionsRefund ?? 0;
        
        // Calculate earnings for the current month
        $earnings = [
            'unpaid' => $user->clicks->where('status', 'Approved')->sum('earned'),
            'paid' => $user->clicks->where('status', 'paid')->sum('earned') + $refCommissionsPaid,
            'refunds' => $refCommissionsRefund + $user->clicks->whereIn('status', ['Refunded','Chargeback'])->sum('earned') ,
            'refcommission' => $refCommissionsEarned,
        ];
        

        return view('affiliate.dashboard', compact('clicksToday',
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
                                                'currency',
                                                'earnings'
                                            ));

    }

    public function topcampaignsDash(Request $request)
    {
        //if ($request->ajax()) {
            $userId = Auth::user()->id;
            $data = DB::table('clicks')
            ->where('user_id', $userId)
            ->whereBetween('created_at', [now()->startOfMonth(), now()])
            ->select('offer_id', DB::raw('COUNT(id) as clicks'))
            ->groupBy('offer_id')
            ->orderByDesc('clicks')
            ->limit(10)
            ->get();
            return Datatables::of($data)

                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="report?start_date=' . now()->startOfMonth()->format('Y-m-d') . '&end_date=' . now()->format('Y-m-d') . '&campaign_id=' . $row->offer_id . '" class="edit btn btn-primary btn-sm">View</a>';
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
       // }
    }


    
}

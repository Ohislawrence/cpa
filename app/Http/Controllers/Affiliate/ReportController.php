<?php

namespace App\Http\Controllers\Affiliate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DataTables;
use App\Models\Click;
use App\Models\Currency;
use Auth;

class ReportController extends Controller
{
    public function report(Request $request)
    {
        // Get the authenticated user's ID
        $userId = Auth::user()->id;

        // Fetch all offers the user has clicks for
        $offers = DB::table('clicks')
            ->where('user_id', $userId)
            ->distinct('offer_id')
            ->pluck('offer_id');

        // Fetch offer names for dropdown
        $campaigns = DB::table('offers')
            ->whereIn('offerid', $offers)
            ->pluck('name', 'offerid');

        // Fetch all active campaigns for the dropdown
        //$campaignClicks = Click::where('user_id', Auth::user()->id)->get();
        $currency = Currency::where('id', settings()->get('default_currency'))->first();
        return view('affiliate.reports', compact('campaigns','currency'));
    }

    public function getReportData(Request $request)
    {
        $userId = Auth::user()->id;
        $campaignId = $request->input('campaign_id');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Validate inputs
        if (empty($startDate) || empty($endDate)) {
            return response()->json(['error' => 'Invalid date range'], 400);
        }
        
        // Stats
        $stats = DB::table('clicks')
        ->where('user_id', $userId)
        ->when($campaignId !== 'all', function ($query) use ($campaignId) {
            return $query->where('offer_id', $campaignId);
        })
        ->whereBetween('created_at', [$startDate, $endDate])
        ->selectRaw('
            COUNT(*) as total_clicks, 
            SUM(conversion) as total_conversions, 
            SUM(earned) as total_earned,
            COALESCE(SUM(earned) / NULLIF(COUNT(*), 0), 0) as epc
        ')
        ->first();

        if (empty($stats)) {
            return response()->json(['error' => 'No data found for the selected filters'], 404);
        }

        // Line Chart Data
        $lineChartData = DB::table('clicks')
            ->where('user_id', $userId)
            ->when($campaignId !== 'all', function ($query) use ($campaignId) {
                return $query->where('offer_id', $campaignId);
            })
            ->whereBetween('created_at', [$startDate, $endDate])
            ->select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('COUNT(*) as total_clicks'),
                DB::raw('SUM(conversion) as total_conversions')
            )
            ->groupBy('date')
            ->orderBy('date')
            ->get();

            // Regions by Clicks and Conversions
    $clicksData = Click::query()
        ->where('user_id', $userId)
        ->when($campaignId !== 'all', function ($query) use ($campaignId) {
            return $query->where('offer_id', $campaignId);
        })
        ->whereBetween('created_at', [$startDate, $endDate])
        ->select('country_id', 
            \DB::raw('COUNT(*) as total_clicks'), 
            \DB::raw('SUM(conversion) as total_conversions')
        )
        ->groupBy('country_id')
        ->orderByDesc('total_clicks')
        ->get();

    $countryIds = $clicksData->pluck('country_id')->unique();
    $countries = \App\Models\Country::whereIn('id', $countryIds)->pluck('name', 'id'); // [id => name]

    $regionsData = $clicksData->map(function ($click) use ($countries) {
        return (object) [
            'country_name' => $countries[$click->country_id] ?? 'Unknown',
            'total_clicks' => $click->total_clicks,
            'total_conversions' => (int)$click->total_conversions,
        ];
    });

    //second stats
    $user = auth()->user()->load(['clicks' => function ($query) use ($startDate, $endDate) {
        $query->select('user_id', 'status', 'earned', 'conversion', 'refcommission') // Fixed "refcommision" typo
              ->whereBetween('created_at', [$startDate, $endDate]);
    }]);

    $referralId = auth()->user()->id;

    $referralStats = DB::table('clicks')
        ->where('referral', $referralId)
        ->whereBetween('created_at', [$startDate, $endDate])
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

    // Calculate earnings
    $earnings = [
        'unpaid' => $user->clicks->where('status', 'Approved')->sum('earned') ,
        'paid' => $user->clicks->where('status', 'paid')->sum('earned') + $refCommissionsPaid,
        'refunds' => $refCommissionsRefund + $user->clicks->whereIn('status', ['Refunded', 'Chargeback'])->sum('earned'),
        'refcommission' => $refCommissionsEarned,
    ];

        // Daily Performance Table
        $dailyPerformance = DB::table('clicks')
            ->where('user_id', $userId)
            ->when($campaignId !== 'all', function ($query) use ($campaignId) {
                return $query->where('offer_id', $campaignId);
            })
            ->whereBetween('created_at', [$startDate, $endDate])
            ->select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('COUNT(*) as total_clicks'),
                DB::raw('SUM(conversion) as total_conversions'),
                DB::raw('SUM(earned) / COUNT(*) as epc'),
                DB::raw('SUM(conversion) * 100 / COUNT(*) as conversion_rate')
            )
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return response()->json([
            'stats' => [
                'total_clicks' => $stats->total_clicks,
                'total_conversions' => $stats->total_conversions,
                'total_earned' => $stats->total_earned,
                'epc' => $stats->epc,
                'earnings' => $earnings,
            ],
            'line_chart_data' => $lineChartData,
            'regions_by_clicks' => $regionsData,
            'daily_performance' => $dailyPerformance,
            
        ]);
    }

    public function getDatatableData(Request $request)
    {
        $userId = Auth::user()->id;
        $campaignId = $request->input('campaign_id');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');


        if ($campaignId == 'all') {
            $data = Click::select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('COUNT(*) as total_clicks'),
                DB::raw('SUM(cost) as total_earnings')
            )
            ->where('user_id', $userId)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('date')
            ->orderBy('date')
            ->get();
        }else{
            $data = Click::select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('COUNT(*) as total_clicks'),
                DB::raw('SUM(cost) as total_earnings')
            )
            ->where('user_id', $userId)
            ->where('offer_id', $campaignId)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('date')
            ->orderBy('date')
            ->get();
        }
        
        

        return Datatables::of($data)
            ->addColumn('date', function ($row) {
                return $row->date;
            })
            ->addColumn('clicks', function ($row) {
                return number_format($row->total_clicks, 0);
            })
            ->addColumn('epc', function ($row) {
                $epc = $row->total_clicks > 0 ? $row->total_earnings / $row->total_clicks : 0;
                return number_format($epc, 2);
            })
            ->addColumn('conversions', function ($row) use ($campaignId) {
                if ($campaignId === 'all') {
                    $conversions = Click::whereDate('created_at', $row->date)
                        ->sum('conversion');
                } else {
                    $conversions = Click::where('offer_id', $campaignId)
                        ->whereDate('created_at', $row->date)
                        ->sum('conversion');
                }
                return number_format($conversions, 0);
            })
            ->addColumn('conversionRate', function ($row) use ($campaignId) {
                if ($campaignId === 'all') {
                    $conversions = Click::whereDate('created_at', $row->date)
                        ->sum('conversion');
                    $CR = ($conversions/$row->total_clicks)*100;
                } else {
                    $conversions = Click::where('offer_id', $campaignId)
                        ->whereDate('created_at', $row->date)
                        ->sum('conversion');
                    $CR = ($conversions/$row->total_clicks)*100;
                }
                return number_format($CR, 2);
            })
            ->rawColumns(['date', 'clicks', 'epc', 'conversions','conversionRate'])
            ->make(true);
    }
}

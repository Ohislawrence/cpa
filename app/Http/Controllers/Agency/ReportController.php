<?php

namespace App\Http\Controllers\Agency;

use App\Http\Controllers\Controller;
use App\Models\Click;
use App\Models\Currency;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DataTables;
use Yajra\DataTables\Contracts\DataTable;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        // Fetch all active campaigns for the dropdown
        $campaigns = DB::table('offers')
            ->where('status', 'Active') // Assuming 'active' campaigns are relevant
            ->pluck('name', 'offerid'); // Get name and id for dropdown
        $currency = Currency::where('id', settings()->get('default_currency'))->first();
        return view('agency.reports', compact('campaigns','currency'));
    }

    public function getReportData(Request $request)
    {
        $campaignId = $request->input('campaign_id');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Validate inputs
        if (empty($startDate) || empty($endDate)) {
            return response()->json(['error' => 'Invalid date range'], 400);
        }

        if ($campaignId !== 'all' && !is_numeric($campaignId)) {
            return response()->json(['error' => 'Invalid campaign ID'], 400);
        }

        // Stats
        if ($campaignId == 'all') {
            $stats = DB::table('clicks')
                ->whereBetween('created_at', [$startDate, $endDate])
                ->selectRaw('COUNT(*) as total_clicks, SUM(conversion) as total_conversions, SUM(earned) as total_revenue, COUNT(distinct user_id) as active_affiliate')
                ->first();
        } else {
            $stats = DB::table('clicks')
                ->where('offer_id', $campaignId)
                ->whereBetween('created_at', [$startDate, $endDate])
                ->selectRaw('COUNT(*) as total_clicks, SUM(conversion) as total_conversions, SUM(earned) as total_revenue, COUNT(distinct user_id) as active_affiliate')
                ->first();
        }

        if (empty($stats)) {
            return response()->json(['error' => 'No data found for the selected filters'], 404);
        }

        // Affiliates by Clicks
        if ($campaignId == 'all') {
            $affiliatesByClicks = DB::table('clicks')
                ->join('users', 'clicks.user_id', '=', 'users.id')
                ->whereBetween('clicks.created_at', [$startDate, $endDate])
                ->select('users.id as affiliate_id', 'users.name as affiliate_name', DB::raw('COUNT(*) as total_clicks'))
                ->groupBy('users.id', 'users.name')
                ->orderByDesc('total_clicks')
                ->limit(10)
                ->get();
        } else {
            $affiliatesByClicks = DB::table('clicks')
                ->join('users', 'clicks.user_id', '=', 'users.id')
                ->where('clicks.offer_id', $campaignId)
                ->whereBetween('clicks.created_at', [$startDate, $endDate])
                ->select('users.id as affiliate_id', 'users.name as affiliate_name', DB::raw('COUNT(*) as total_clicks'))
                ->groupBy('users.id', 'users.name')
                ->orderByDesc('total_clicks')
                ->limit(10)
                ->get();
        }

        // Affiliates by Conversions
        if ($campaignId == 'all') {
            $affiliatesByConversions = DB::table('clicks')
                ->join('users', 'clicks.user_id', '=', 'users.id')
                ->whereBetween('clicks.created_at', [$startDate, $endDate])
                ->select('users.id as affiliate_id', 'users.name as affiliate_name', DB::raw('SUM(clicks.conversion) as total_conversions'))
                ->groupBy('users.id', 'users.name')
                ->orderByDesc('total_conversions')
                ->limit(10)
                ->get();
        } else {
            $affiliatesByConversions = DB::table('clicks')
                ->join('users', 'clicks.user_id', '=', 'users.id')
                ->where('clicks.offer_id', $campaignId)
                ->whereBetween('clicks.created_at', [$startDate, $endDate])
                ->select('users.id as affiliate_id', 'users.name as affiliate_name', DB::raw('SUM(clicks.conversion) as total_conversions'))
                ->groupBy('users.id', 'users.name')
                ->orderByDesc('total_conversions')
                ->limit(10)
                ->get();
        }

        // Regions by Clicks and Conversions
    $clicksData = Click::query()
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

    //$regionsData = collect($regionsData)->map(fn($item) => (object) $item);

       /**  $regionsByClicks = $regionsData->map(function ($item) {
            return ['country_name' => $item->country_name, 'total_clicks' => $item->total_clicks];
        });

        $regionsByConversions = $regionsData->map(function ($item) {
            return ['country_name' => $item->country_name, 'total_conversions' => $item->total_conversions];
        });
    */
        // Line Chart Data
        if ($campaignId == 'all') {
            $lineChartData = DB::table('clicks')
                ->whereBetween('created_at', [$startDate, $endDate])
                ->select(
                    DB::raw('DATE(created_at) as date'),
                    DB::raw('COUNT(*) as total_clicks'),
                    DB::raw('SUM(conversion) as total_conversions'),
                    DB::raw('SUM(earned) as total_revenue')
                )
                ->groupBy('date')
                ->orderBy('date')
                ->get();
        } else {
            $lineChartData = DB::table('clicks')
                ->where('offer_id', $campaignId)
                ->whereBetween('created_at', [$startDate, $endDate])
                ->select(
                    DB::raw('DATE(created_at) as date'),
                    DB::raw('COUNT(*) as total_clicks'),
                    DB::raw('SUM(conversion) as total_conversions'),
                    DB::raw('SUM(earned) as total_revenue')
                )
                ->groupBy('date')
                ->orderBy('date')
                ->get();
        }

        // Return all data as JSON
        return response()->json([
            'stats' => [
                'active_affiliates' => $stats->active_affiliate,
                'total_clicks' => $stats->total_clicks,
                'total_conversions' => $stats->total_conversions,
                'total_revenue' => $stats->total_revenue,
            ],
            'affiliates_by_clicks' => $affiliatesByClicks,
            'affiliates_by_conversions' => $affiliatesByConversions,
            'regions_by_clicks' => $regionsData,
            'line_chart_data' => $lineChartData,
        ]);
    }
    public function getDatatableData(Request $request)
    {
        $campaignId = $request->input('campaign_id');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');


        if ($campaignId == 'all') {
            $data = Click::select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('COUNT(*) as total_clicks'),
                DB::raw('SUM(cost) as total_earnings')
            )
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
            ->addColumn('affiliates', function ($row) use ($campaignId) {
                if ($campaignId === 'all') {
                    $affiliates = Click::whereDate('created_at', $row->date)
                        ->distinct('user_id')
                        ->count('user_id');
                } else {
                    $affiliates = Click::where('offer_id', $campaignId)
                        ->whereDate('created_at', $row->date)
                        ->distinct('user_id')
                        ->count('user_id');
                }
                return number_format($affiliates, 0);
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
            ->rawColumns(['date', 'clicks', 'epc', 'conversions', 'affiliates','conversionRate'])
            ->make(true);
    }
}

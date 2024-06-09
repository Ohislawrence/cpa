<?php

namespace App\Http\Controllers\Admin;

use App\Charts\DailyUsersChart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard1(Request $request,DailyUsersChart $chart)
    {
        $timeframe = $request->input('timeframe', 7);

        // Validate timeframe to be either 7, 30, or 90 days
        if (!in_array($timeframe, [7, 30, 90])) {
            $timeframe = 7;
        }

        $chart = $chart->build($timeframe);
        return view('admin.dashboard1', compact('chart', 'timeframe'));
    }

    public function  dashboard2()
    {
        return view('admin.dashboard2');
    }
}

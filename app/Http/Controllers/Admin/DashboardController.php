<?php

namespace App\Http\Controllers\Admin;

use App\Charts\DailyUsersChart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard1(DailyUsersChart $chart)
    {
        return view('admin.dashboard1', ['chart' => $chart->build()]);
    }

    public function  dashboard2()
    {
        return view('admin.dashboard2');
    }
}

<?php

namespace App\Http\Controllers\Affiliate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboardone()
    {
        return view('affiliate.dashboard');
    }

    public function dashboardtwo()
    {
        return view('affiliate.dashboard2');
    }
}

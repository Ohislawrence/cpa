<?php

namespace App\Http\Controllers\Agency;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Click;
use App\Models\Configuration;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DataTables;

class DashboardController extends Controller
{
    public function index()
    {
        $clicked = Click::where('user_id', Auth::user()->id);
        $payThisMonth = $clicked->where('created_at','>=', Carbon::now()->startOfMonth())->get();
        $payYesterday = $clicked->where('created_at','>=', Carbon::yesterday())->get();
        $payToday = $clicked->where('created_at','>=', Carbon::today())->get();
        $currency = Configuration::where('key', 'default_currency')->first();

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

        return view('agency.dashboard', compact('earnedThisMonth','earnedYesterday','earnedToday', 'currency'));

    }
}

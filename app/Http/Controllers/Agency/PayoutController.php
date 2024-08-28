<?php

namespace App\Http\Controllers\Agency;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PayoutController extends Controller
{
    public function index()
    {
        return view('agency.payout.viewrequest');
    }

    public function options()
    {
        return view('agency.payout.payoutoption');
    }
}

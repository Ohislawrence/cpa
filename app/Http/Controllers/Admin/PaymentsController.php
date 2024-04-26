<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public function transaction()
    {
        return view('admin.transactions');
    }

    public function sendpayments()
    {
        return view('admin.sendpayments');
    }
}

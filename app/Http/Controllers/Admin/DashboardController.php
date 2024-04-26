<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard1()
    {
        return view('admin.dashboard1');
    }

    public function  dashboard2()
    {
        return view('admin.dashboard2');
    }
}

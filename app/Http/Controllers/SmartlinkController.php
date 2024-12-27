<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SmartlinkController extends Controller
{
    public function allsmartlinks(Request $request){
        return view("agency.smartlink.viewall");
    }
}

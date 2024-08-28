<?php

namespace App\Http\Controllers\Agency;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function send()
        {
            return view('agency.email.sendemail');
        }


    public function settings()
    {
        return view('agency.email.emailsettings');
    }

    public function systememail()
    {
        return view('agency.email.systememail');
    }


}

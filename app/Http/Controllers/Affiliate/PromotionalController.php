<?php

namespace App\Http\Controllers\Affiliate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PromotionalController extends Controller
{
    public function marketingassets()
    {
        return view('affiliate.marketingassets');
    }

    public function apis()
    {
        return view('affiliate.apis');
    }
}

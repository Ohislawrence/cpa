<?php

namespace App\Http\Controllers\Agency;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Country;
use App\Models\Geo;
use App\Models\Offer;
use App\Models\Payout;
use App\Models\Target;
use App\Models\User;
use Illuminate\Support\Str;
use DataTables;
use Yajra\DataTables\Contracts\DataTable;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::latest()->get();
        return view('agency.offers',compact('offers'));
    }

    public function create()
    {
        $categories = Category::latest()->get();
        $locations = Country::all();
        $payouts = Payout::all();
        return view('agency.newcampaigns', compact( 'categories', 'locations', 'payouts'));
    }

}

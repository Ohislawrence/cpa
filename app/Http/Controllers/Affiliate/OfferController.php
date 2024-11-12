<?php

namespace App\Http\Controllers\Affiliate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Models\Category;
use App\Models\Country;
use App\Models\Geo;
use App\Models\Offer;
use App\Models\Payout;
use App\Models\Target;
use Illuminate\Support\Str;
use Yajra\DataTables\Contracts\DataTable;

class OfferController extends Controller
{
    public function index()
    {
        return view('affiliate.offers');
    }

    public function viewoffers(Request $request)
    {
        if ($request->ajax()) {
            $data = Offer::where('status', 'Active')->latest()->get();
            return Datatables::of($data)

                ->addColumn('action', function($row){
                    $actionBtn = '<a href="offers/'.$row->offerid.'/view" class="edit btn btn-primary btn-sm">View</a>';
                    return $actionBtn;
                })
                ->addColumn('category', function($row){
                    $category = $row->category->name;
                    return $category;
                })
                ->addColumn('targetting', function($row){
                    foreach($row->targets as $tar)
                    {
                        $targetting = $tar->target;
                        $tarrs[] = $targetting;
                    }
                    return $tarrs;

                })
                ->addColumn('payout', function($row){
                    foreach($row->targets as $tar)
                    {
                        $payout = $tar->payout;
                        $payys[] = $payout;
                    }
                    return '$'.round(array_sum($payys)/count($payys),2);
                })
                ->addColumn('geos', function($row){
                    foreach($row->geos as $tar)
                    {
                        $geoss = $tar->country->code;
                        $ge[] = $geoss;
                    }
                    return $ge;
                })
                ->addColumn('payouttype', function($row){
                     $payouttype = $row->payouttype->name;
                    return $payouttype;
                })
                ->addColumn('epc', function($row){


                    // Avoid division by zero
                    $averageEarnings =  0;

                   return $averageEarnings;
               })
                ->rawColumns(['action','category','targetting', 'payout', 'payouttype', 'geos','epc'])
                ->make(true);
        }
    }

    public function thisoffer($id, Request $request)
    {
        $offer = Offer::where('offerid', $id)->first();
        if($offer && $offer->click){
            $EPC = $offer->click->where('offer_id', $offer->offerid)->sum('earned')/$offer->click->where('offer_id', $offer->offerid)->count();
        }else{
            $EPC = 0;
        }
        return view('affiliate.viewoffer', compact('offer', 'EPC'));
    }


    public function ailink()
    {
        return view('affiliate.ailink');
    }
}

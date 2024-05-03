<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Click;
use App\Models\Offer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DataTables;
use Yajra\DataTables\Contracts\DataTable;

class ClicksController extends Controller
{
    public function offerclicks(Request $request, $id)
    {
        $offer = Offer::find($id);
        //$click = Click::where('clickID', '99791032')->first();
        //$data1 = Offer::where('id', $id)->first();
        //$data = $data1->offerid;
        //dd($click->offer[0]->user);
        return view('admin.offerclicks', compact('offer'));
    }


    public function offerclickstable(Request $request, $id)
    {
        if ($request->ajax()) {
            $data1 = Offer::where('id', $id)->first();
            $data = $data1->click->where('offer_id', $data1->offerid)->latest()->get();
            return Datatables::of($data)
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="" class="edit btn btn-primary btn-sm">View</a>';
                    return $actionBtn;
                })
                ->addColumn('date', function($row){
                    $date = Carbon::createFromFormat('Y-m-d H:i:s', $row->updated_at)->format('d/m/Y');
                    return $date;
                })
                ->rawColumns(['action','date'])
                ->make(true);
        }
    }
}

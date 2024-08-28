<?php

namespace App\Http\Controllers\Agency;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Affiliatedetail;
use App\Models\Agencydetails;
use App\Models\Category;
use App\Models\Country;
use App\Models\Trafficsource;
use DataTables;
use Yajra\DataTables\Contracts\DataTable;
use Illuminate\Support\Facades\Hash;

class AffiliateController extends Controller
{
    public function index()
    {
        $users = User::role('affiliate')->latest()->get();
        $countries = Country::all();
        return view('agency.myaffiliates.affiliates', compact('users','countries'));
    }

    public function settings()
    {
        return view('agency.myaffiliates.affiliatesettings');
    }

    public function getusers(Request $request)
    {
        if ($request->ajax()) {
            $data = User::role('affiliate')->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="user/view/'.$row->id.'/overview" class="edit btn btn-primary btn-sm">View</a>
                                    <a href="user/edit/'.$row->id.'" class="edit btn btn-success btn-sm">Edit</a>
                                    <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->addColumn('role',function($row){
                    $role = $row->getRoleNames()->first();
                    return $role;
                })
                ->rawColumns(['action','role'])
                ->make(true);
        }
    }
}

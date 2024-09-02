<?php

namespace App\Http\Controllers\Agency;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Affiliatedetail;
use App\Models\Agencydetails;
use App\Models\Category;
use App\Models\Click;
use App\Models\Country;
use App\Models\Requestpayment;
use App\Models\Trafficsource;
use Carbon\Carbon;
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
                    $actionBtn = '<a href="affiliate/'.$row->id.'/overview" class="edit btn btn-primary btn-sm">View</a>
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

    public function getuserclickstats(Request $request, $id)
    {
        if ($request->ajax()) {
            $data = Click::where('user_id', $id)->latest()->get();
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

    public function getpaymentrequest(Request $request, $id)
    {
        if ($request->ajax()) {
            $data = Requestpayment::where('user_id', $id)->latest()->get();
            return Datatables::of($data)
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="" class="edit btn btn-primary btn-sm">View</a>
                    <a href="" class="edit btn btn-primary btn-sm">Pay</a>';
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


    public function clickstats($id)
    {
        $user = User::find($id);
        return view('agency.myaffiliates.affiliateDetails.clickstats', compact('user'));
    }

    public function overview($id)
    {
        $user = User::find($id);
        return view('agency.myaffiliates.affiliateDetails.overview', compact('user'));
    }

    public function paymentrequest($id)
    {
        $user = User::find($id);
        return view('agency.myaffiliates.affiliateDetails.paymentRequest', compact('user'));
    }

    public function referrals(User $user)
    {
        return view('agency.myaffiliates.affiliateDetails.referrals', compact('user'));
    }

    public function trafficsource(User $user)
    {
        return view(('agency.myaffiliates.affiliateDetails.trafficsource'), compact('user'));
    }

    public function updateuserdetails(User $user)
    {
        return view(('agency.myaffiliates.affiliateDetails.updateuserDetails'), compact('user'));
    }
}

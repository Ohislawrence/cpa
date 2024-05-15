<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Affiliatedetail;
use App\Models\Agencydetails;
use App\Models\Category;
use App\Models\Country;
use App\Models\Trafficsource;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use Yajra\DataTables\Contracts\DataTable;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();
        $countries = Country::all();
        return view('admin.users', compact('users','countries'));
    }


    public function store(Request $request) {

        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:Users,email',
            'password' => 'required|string',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        

        $user->assignRole($request->role);

        return back()->with('message','User Created');
    }

    public function getusers(Request $request)
    {
        if ($request->ajax()) {
            $data = User::latest()->get();
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

    public function viewuser(User $user)
    {
        //$user = User::find($id);
        
        return view('admin.profiled.overview', compact('user'));
        
        
    }

    public function refferals()
    {
        return view('admin.refferals');
    }


    public function edituser($id)
    {
        $user = User::find($id);
        $country = Country::all();
        $categories = Category::all();
        return view('admin.edituser', compact('user','country','categories'));
    }

    public function updateuser(Request $request, $id) {

        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required',
        ]);

        $user = User::find($id);

        $user->Update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $user->assignRole($request->role);

        Affiliatedetail::updateOrCreate([
            'user_id' => $user->id
        ], [
            'status' => $request->status,
            'city' => 'pending',
            'country' => $request->country,
            'region' => $request->region,
            'phonenumber' => $request->phone,
            'instantmessageid' => $request->instantmessageid,
        ]);

        Trafficsource::updateOrCreate([
            'user_id' => $user->id
        ], [
            'source' => $request->source,
            'address' => $request->address,
            'rank' => $request->rank,
            'followers' => $request->followers,
            'monthlyvisit' => $request->monthlyvisit,
            'note' => $request->note,
            'status' => 'Active',
        ]);


        return back()->with('message','Affiliate Account Updated');
    }

    public function traffic(Request $request)
    {
        Trafficsource::updateOrCreate([
            'user_id' => $request->userid
        ], [
            'source' => $request->source,
            'address' => $request->address,
            'rank' => $request->rank,
            'followers' => $request->followers,
            'monthlyvisit' => $request->monthlyvisit,
            'note' => $request->note,
            'status' => 'Active',
        ]);
    }

    public function updateuseragency(Request $request, $id) {

        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required',
        ]);

        $user = User::find($id);

        $user->Update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $user->assignRole($request->role);

        Agencydetails::updateOrCreate([
            'user_id' => $user->id
        ], [
            'active' => $request->status,
            'companyname' => $request->companyname,	
            'brandaddress' => $request->brandaddress,
            'country' => $request->country,
            'phonenumber' => $request->phonenumber,
            'branddesc' => $request->branddesc,
            'brandproductlandingurl' => $request->brandproductlandingurl,
            'category_id' => $request->category,
            'brandinstantmessager' => $request->brandinstantmessager,
            'brandinstantmessageid' => $request->brandinstantmessageid,
            'brandmonthlybudget' => $request->brandmonthlybudget,
            'note' => $request->note,
            'brandname' => $request->brandname,
            'brandtracking' => 'pending',
            'brandtargetgeos' => 'pending',
            'brandpreferredpayouttype' => 'pending',
            'brandpaymenyterm' => 'pending',
            'brandurl' => 'pending',
            'brandinterestedtraffic' => 'pending',
            'city' => 'pending',
            'region' => 'pending',
            
            
        ]);


        return back()->with('message','Affiliate Account Updated');
    }


    public function overview($id)
    {
        $user = User::find($id);
        return view('admin.profiled.overview', compact('user'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Affiliatedetail;
use App\Models\Agencydetails;
use App\Models\Category;
use App\Models\Country;
use App\Models\Tenant;
use App\Models\Trafficsource;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Container\Attributes\DB;
use Yajra\DataTables\Contracts\DataTable;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();
        $countries = Country::all();
        //$tenant = tenancy()->id();
        //dd($tenant);
        return view('admin.users', compact('users','countries'));
    }

    public function deleteUser($id)
    {
        $userID = User::find($id);
        $tenant = Tenant::find($userID->tenants[0]->id);
        $databaseName = $tenant->getDatabaseName();

        if (!$tenant) {
            return response()->json(['error' => 'Tenant not found'], 404);
        }

        try {
            // Delete the tenant
            $tenant->delete();
            $userID->delete();

            if(env('APP_ENV') == 'production') 
            {
                $subdomainForDelete = $tenant.'.tracklia.com';
                $this->deleteSubdomainapi($subdomainForDelete);
                $this->deleteDBapi($databaseName);
            }

            return response()->json(['success' => 'Tenant deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete tenant: ' . $e->getMessage()], 500);
        }  
    }

    public function generateUniqueCode()
    {
        do {
            $code = random_int(10000000, 99999999);
        } while (Affiliatedetail::where("referral_id", "=", $code)->first());

        return $code;
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

        if($request->role == 'affiliate')
        {
            Affiliatedetail::updateOrCreate([
                'referral_id' => $this->generateUniqueCode(),
                'status' => 'Pending',
                'user_id' => $user->id,
                'city'=> 1,
                'country'=> 1,
                'region'=> 1,
                'phonenumber'=> 1,
                'instantmessageid' => 1,
            ]);
        }


        return back()->with('message','User Created');
    }

    public function getusers(Request $request) 
    {
        //if ($request->ajax()) {
            $data = User::role('tenant')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="user/view/'.$row->id.'/overview" class="edit btn btn-primary btn-sm">View</a>
                                <a href="user/edit/'.$row->id.'" class="edit btn btn-success btn-sm">Edit</a>
                                <button class="delete btn btn-danger btn-sm" onclick="hapus('.$row->id.')">Delete</button>';
                    return $actionBtn;
                })
                ->addColumn('tenantName', function($row) {
                    return $row->tenants[0]->id;
                })
                ->addColumn('tenantDomain', function($row) {
                    return $row->tenants[0] ? $row->tenants[0]->domains()->first()->domain : 'No domain';
                })
                ->addColumn('role', function($row) {
                    return $row->getRoleNames()->first();
                })
                ->addColumn('plan', function($row) {
                    return $row->subscriptiontracker[0]->plan->name;
                })
                ->rawColumns(['action', 'role','tenantName','tenantDomain','plan'])
                ->make(true);
       // }
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


        return back()->with('message','Affiliate Account Updated');
    }

    public function viewtrafficsource($id)
    {
        $user = User::find($id);
        return view('admin.trafficsource', compact('user'));
    }

    public function traffic(Request $request, $id)
    {
        Trafficsource::create([
            'user_id' => $id,
            'source' => $request->source,
            'address' => $request->address,
            'rank' => 'nil',
            'followers' => $request->followers,
            'monthlyvisit' => $request->monthlyvisit,
            'note' => $request->note,
            'status' => $request->status,
        ]);

        return back()->with('message','Traffic Source Added');
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

    public function overviewagency($id)
    {
        $user = User::find($id);
        return view('admin.agencyprofile.overview', compact('user'));
    }

    public function gettrafficsource(Request $request, $id)
    {
        if ($request->ajax()) {
            $data = Trafficsource::where('user_id', $request->id)->get();
            //dd($data);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="user/view/'.$row->id.'/overview" class="edit btn btn-primary btn-sm">View</a>
                                    <a href="user/edit/'.$row->id.'" class="edit btn btn-success btn-sm">Edit</a>
                                    <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function deleteSubdomainapi($subdomain){
        $user = 'tracklia';
        $pass = 'Victor@358@1616';
        $host = 'tracklia.com';
        
        $url = 'https://'.rawurlencode($user).':'.rawurlencode($pass).'@'.$host.':2003/index.php?api=json&act=domainmanage'; 

        $post = array('delete' => $subdomain);

        // Set the curl parameters 
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        if(!empty($post)){
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
        }

        // Get response from the server. 
        $resp = curl_exec($ch);
        if(!empty(curl_error($ch))){
            echo curl_error($ch); die();
        }

        // The response will hold a string as per the API response method. 
        $res = json_decode($resp, true);
        // Done ?
        if(!empty($res['done'])){
            return true;
        }else{
            return false;
        }
    }

    public function deleteDBapi($db){
        $user = 'tracklia';
        $pass = 'Victor@358@1616';
        $host = 'tracklia.com';
        
        $url = 'https://'.rawurlencode($user).':'.rawurlencode($pass).'@'.$host.':2003/index.php?api=json&act=dbmanage'; 

        $post = array('delete_db' => $db );

        // Set the curl parameters 
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        if(!empty($post)){
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
        }

        // Get response from the server. 
        $resp = curl_exec($ch);
        if(!empty(curl_error($ch))){
            echo curl_error($ch); die();
        }

        // The response will hold a string as per the API response method. 
        $res = json_decode($resp, true);
        // Done ?
        if(!empty($res['done'])){
            return true;
        }else{
            return false;
        }
    }
}

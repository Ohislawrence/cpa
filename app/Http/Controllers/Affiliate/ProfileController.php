<?php

namespace App\Http\Controllers\Affiliate;

use App\Http\Controllers\Controller;
use App\Models\Affiliatedetail;
use App\Models\Trafficsource;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Yajra\DataTables\Contracts\DataTable;

class ProfileController extends Controller
{
    protected function index()
    {

        return view('affiliate.profile');
    }

    public function edit(){
        $user = auth()->user();

        return view('affiliate.editprofile');
    }
    public function trafficsource(Request $request){
        $validated = $request->validate([
            'source' => 'required',
            'address' => 'required',
        ]);


        Trafficsource::create([
            'user_id' => auth()->user()->id,
            'source' => $request->source,
            'address' => $request->address,
            'rank' => $request->niche,
            'followers' => $request->followers,
            'monthlyvisit' => $request->monthlyvisit,
            'note' => $request->note,
            'status' => 'Active',
        ]);

        return back()->with('message','Traffic Source Added');
    }

    public function editPost(Request $request){
        $validated = $request->validate([
            'phone' => 'required',
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if(!empty($request->profile_image)){
            $tenantId = tenant()->id; // Get the current tenant ID
            $file = $request->file('profile_image');
            $code = random_int(10000000, 99999999);
            $filename = 'profile_image-'.$code.'-'.date('Y-m-d-H-i-s') .'.'. $file->getClientOriginalExtension();
            // Save the file to a tenant-specific folder (e.g., profiles/<tenant-id>/image.jpg)
            $path = $file->storeAs("profiles/{$tenantId}", $filename, 'tenant');
        }
        //dd($path );
        $user = Affiliatedetail::where('user_id', auth()->user()->id)->first();
 
        $user->update([
            'city' => $request->region,
            'country' => $request->country,
            'region' => 'edit',
            'phonenumber' => $request->phone, 
        ]);

    
        return back()->with('message','Profile Updated');
    }

    public function editpasswordPost(Request $request){
        $request->validate([
            'old_password' => ['required'],
            'password' => ['required', 'confirmed', Password::min(8)],
        ]);

        $user = User::where('id', auth()->user()->id)->first(); 

        $new_pass_hash = Hash::make($request->password) ;

        if(!Hash::check($request->old_password, $user->password)){
            return back()->with('message','The old password id not correct');
        }
        
        $user->password = $new_pass_hash;
        $user->save();

        return back()->with('message','Paasword Updated!');
    }


    public function gettrafficsource(Request $request){
    {
        if ($request->ajax()) {
            $data = Trafficsource::where('user_id', auth()->user()->id)->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="user/edit/" class="edit btn btn-success btn-sm">Edit</a>
                                     ';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    }

    public function thankyouapproval()
    {
        return view('affiliate.thankyouallowaffiliate');
    }
}

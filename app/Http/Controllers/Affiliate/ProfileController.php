<?php

namespace App\Http\Controllers\Affiliate;

use App\Http\Controllers\Controller;
use App\Models\Affiliatedetail;
use App\Models\Click;
use App\Models\Currency;
use App\Models\Payout;
use App\Models\Payoutoption;
use App\Models\Trafficsource;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Yajra\DataTables\Contracts\DataTable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {  
        // Retrieve necessary settings in one query
        $settings = settings();

        // Fetch payout method & currency in a single query each
        $payoutType = Payoutoption::find($settings->get('payout_methods'))?->processor ?? 'Not set';
        $currency = Currency::find($settings->get('default_currency'));

        // Get the authenticated user with only necessary relations
        $user = auth()->user()->load(['clicks' => function ($query) {
            $query->select('user_id', 'status', 'earned','conversion','refcommission');
        }]);

        $referralId = auth()->user()->id;

        $referralStats = DB::table('clicks')
            ->where('referral', $referralId)
            ->selectRaw("
                SUM(CASE WHEN status IN ('Approved', 'Paid') THEN refcommission ELSE 0 END) as refCommissionsEarned,
                SUM(CASE WHEN refstatus = 'Paid' THEN refcommission ELSE 0 END) as refCommissionsPaid,
                SUM(CASE WHEN status IN ('Refunded', 'Chargeback') THEN refcommission ELSE 0 END) as refCommissionsRefund
            ")
            ->first();

        // Extract values
        $refCommissionsEarned = $referralStats->refCommissionsEarned ?? 0;
        $refCommissionsPaid = $referralStats->refCommissionsPaid ?? 0;
        $refCommissionsRefund = $referralStats->refCommissionsRefund ?? 0;

        // Calculate earnings efficiently
        $earnings = [
            'unpaid' => $user->clicks->where('status', 'Approved')->sum('earned'),
            'paid' => $user->clicks->where('status', 'paid')->sum('earned') + $refCommissionsPaid,
            'net' => $user->clicks->sum('earned') + $refCommissionsEarned,
            'conversion' => $user->clicks->sum('conversion'),
        ];

        //dd($earnings['unpaid']);

        return view('affiliate.profile', compact('currency', 'payoutType', 'earnings'));
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
    public function editPaymentdetails(Request $request){
        $validated = $request->validate([
            'payoneer_ID' => 'integer',
            'wise_ID' => 'email:rfc,dns',
            'paypal_email' => 'email:rfc,dns'
        ]);
        $user = Affiliatedetail::where('user_id', Auth::id())->first();

        $user->update([
            'payoneer_ID' => $request->payoneer_ID ?? null,
            'wise_ID' => $request->wise_email ?? null,
            'paypal_email' => $request->paypal_email ?? null,
        ]);

        return back()->with('message','Payment Details Updated');

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
        $user = Affiliatedetail::where('user_id', Auth::id())->first();
 
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

<?php

namespace App\Http\Controllers\Agency;

use App\Http\Controllers\Controller;
use App\Mail\AffiliateInvite;
use App\Mail\StatusChangeEmail;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Affiliatedetail;
use App\Models\Agencydetails;
use App\Models\Category;
use App\Models\Click;
use App\Models\Country;
use App\Models\Emailinvite;
use App\Models\Requestpayment;
use App\Models\Trafficsource;
use Bavix\Wallet\Models\Transaction;
use Carbon\Carbon;
use DataTables;
use Yajra\DataTables\Contracts\DataTable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


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


    public function getpaymentrequestforall(Request $request)
    {
        if ($request->ajax()) {
            $data = Requestpayment::latest()->get();
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




    public function getusertransaction(Request $request, $id)
    {
        if ($request->ajax()) {
            $data = Transaction::where('payable_id', $id)->latest()->get();
            return Datatables::of($data)
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="" class="edit btn btn-primary btn-sm">View</a>';
                    return $actionBtn;
                })
                ->addColumn('date', function($row){
                    $date = Carbon::createFromFormat('Y-m-d H:i:s', $row->updated_at)->format('d/m/Y');
                    return $date;
                })
                ->addColumn('amounts', function($row){
                    $amounts = number_format($row->amount/100, 2) ;
                    return $amounts;
                })
                ->rawColumns(['action','date','amounts'])
                ->make(true);
        }
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
        //$user->assignRole($request->role);

        Affiliatedetail::updateOrCreate([
            'user_id' => $user->id
        ], [
            
            'city' => 'pending',
            'country' => $request->country,
            'region' => $request->region,
            'phonenumber' => $request->phone,
            'instantmessageid' => $request->instantmessageid,
        ]);

        $affDetails = Affiliatedetail::where('user_id', $user->id)->first();
        if($affDetails->status != $request->status)
        {
            $affDetails->update(['status' => $request->status,]);

            //send an email
            if($request->status == 'Active')
            {
                $status = 'Approved';
                $theMessage = "We are excited to inform you that your affiliate account has been approved! You are now officially part of our affiliate program, and we can't wait to see you succeed.
                ";
                Mail::to($user->email)->queue(new StatusChangeEmail($user, $status,$theMessage));
            }
            if($request->status == 'Pending')
            {
                $status = 'Pending';
                $theMessage = "Your account status is now Pending as we review your application. We will notify you once the review is complete.";
                Mail::to($user->email)->queue(new StatusChangeEmail($user, $status,$theMessage));
            }
            if($request->status == 'Rejected')
            {
                $status = 'Rejected';
                $theMessage = "Thank you for your interest in joining our affiliate program. After reviewing your application, we regret to inform you that your account has not been approved at this time.<br/>
                                We encourage you to review our guidelines and reapply in the future. If you have any questions or need further clarification, feel free to reach out to us.";
                Mail::to($user->email)->queue(new StatusChangeEmail($user, $status,$theMessage));
            }
        }


        return back()->with('message','Affiliate Account Updated');
    }

    public function gettrafficsource(Request $request, $id)
    {
        if ($request->ajax()) {
            $data = Trafficsource::where('user_id', $request->id)->get();
            //dd($data);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="user/edit/'.$row->id.'" class="edit btn btn-success btn-sm">Edit</a>
                                     <form action="affiliate/'.$row->id.'/trafficsource/delete" method="POST" onsubmit="return confirm("Are you sure you want to delete this item?");">
                                        @csrf
                                        @method("DELETE")

                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
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

    public function referrals($id)
    {
        $user = User::find($id);
        return view('agency.myaffiliates.affiliateDetails.referrals', compact('user'));
    }

    public function trafficsource($id)
    {
        $user = User::find($id);
        return view('agency.myaffiliates.affiliateDetails.trafficsource', compact('user'));
    }

    public function updateuserdetails($id)
    {
        $user = User::find($id);
        $country = Country::all();
        $categories = Category::all();
        return view('agency.myaffiliates.affiliateDetails.updateuserDetails', compact('user','country','categories'));
    }

    public function transactions($id)
    {
        $user = User::find($id);
        return view('agency.myaffiliates.affiliateDetails.transactions', compact('user'));
    }

    public function trafficsourcedestroy($id)
    {
        // Find the item by ID
        $item = Trafficsource::find($id);

        // Check if the item exists
        if ($item) {
            // Delete the item
            $item->delete();

            // Redirect back with a success message
            return redirect()->back()->with('success', 'Item deleted successfully.');
        } else {
            // Redirect back with an error message if the item doesn't exist
            return redirect()->back()->with('error', 'Item not found.');
        }
    }

    public function createaffiliate(Request $request) {

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

        $user->assignRole('affiliate');

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


        return back()->with('message','Affiliate Created');
    }

    public function inviteaffiliate(Request $request) {

        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:Users,email',
        ]);

        $name = $request->name;
        $email = $request->email;
        $code = $this->generateUniqueInviteCode();

        Emailinvite::create([
            'name' => $name,
            'email' => $email,
            'code' => $code,
        ]);

        Mail::to($email)->queue(new AffiliateInvite($name,$code));

        return back()->with('message','Affiliate invited via email');
    }

    public function generateUniqueCode()
    {
        do {
            $code = random_int(10000000, 99999999);
        } while (Affiliatedetail::where("referral_id", "=", $code)->first());

        return $code;
    }

    public function generateUniqueInviteCode()
    {
        do {
            $code = random_int(10000000, 99999999);
        } while (Emailinvite::where("code", "=", $code)->first());

        return $code;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Spatie\Permission\Models\Role;
use App\Models\Currency;
use App\Models\Kyc;
use App\Models\Plan;
use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Models\User;
use DataTables;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Contracts\DataTable;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TenantController extends Controller
{

    public function create()
    {
        $plans = Plan::all();
        $countries = Currency::all();
        return view('admin.tenant.create', compact('plans','countries'));
    }

    public function allTenants()
    {   
        $kyc = Kyc::all();
        $tenants = Tenant::all();
        return view('admin.tenant.tenants', compact('tenants','kyc'));
    }



    public function createTenant(Request $request)
    {
        $this->validate($request, [
            'business_email' => 'required',
            'business_name' => 'required',
            'subdomain' => 'required',
            'contact_email' => 'required',
        ]);
        $tenant = Tenant::create([
            'id' =>$request->subdomain,
        ]);

        $tenant->domains()->create(['domain' => $request->subdomain . '.' . env('APP_URL')]);

        $kyc = Kyc::create([
            'tenant_id' => $tenant->id,
            'business_name' => $request->business_name,
            'business_email' => $request->business_email,
            'contact_email' => $request->contact_email,
            'contact_name' => $request->contact_name,
            'business_phone' => $request->business_phone,
            'contact_phone' => $request->contact_phone,
            'status' => $request->status,
            'current_plan' =>$request->current_plan,
            'country' => $request->country,
            'website' => $request->website,
            'about' => $request->desc,
        ]);

        $user = User::create([
            'name' => $request->business_name,
            'email' => $request->business_email,
            'password' => Hash::make($request->password),
        ]);

        $role = Role::where('name', 'tenant')->first();
        $user->assignRole($role);

        return redirect()->route('admin.alltenants')->with('message','Tenant Created');
    }

    public function viewcampaign(Request $request)
    {
        if ($request->ajax()) {
            $data = Tenant::latest()->get();
            return Datatables::of($data)

                ->addColumn('action', function($row){
                    $actionBtn = '<a href="campaign/details/'.$row->id.'/view" class="edit btn btn-primary btn-sm">View</a>';
                    return $actionBtn;
                })
                ->addColumn('name', function($row){
                    $category = $row->category->name;
                    return $category;
                })
                ->addColumn('email', function($row){
                    foreach($row->targets as $tar)
                    {
                        $targetting = $tar->target;
                        $tarrs[] = $targetting;
                    }
                    return $tarrs;

                })
                ->addColumn('plan', function($row){
                    foreach($row->targets as $tar)
                    {
                        $payout = $tar->payout;
                        $payys[] = $payout;
                    }
                    return '$'.round(array_sum($payys)/count($payys),2);
                })
                ->addColumn('next_due', function($row){
                     $payouttype = $row->payouttype->name;
                    return $payouttype;
                })
                ->addColumn('age', function($row){
                    $payouttype = $row->payouttype->name;
                   return $payouttype;
               })
               ->addColumn('last_login', function($row){
                $payouttype = $row->payouttype->name;
               return $payouttype;
           })
                ->rawColumns(['action','name', 'email', 'plan', 'next_due', 'age', 'last_login'])
                ->make(true);
        }
    }

    
}

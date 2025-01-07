<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\WelcomeTenant;
use App\Models\Currency;
use App\Models\Kyc;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\Tenant;
use App\Models\User;
use Exception;
use Illuminate\Container\Attributes\Log;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log as FacadesLog;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Stancl\Tenancy\Facades\Tenancy;
use Carbon\Carbon;

class CreatetenantController extends Controller
{
    public function create()
    {
        $plans = Plan::all();
        $countries = Currency::all();
        return view('frontpages.tenantsSignUp', compact('plans','countries'));
    }

    public function tenantCreated()
    {
        return view('frontpages.tenantCreated');
    }

    public function formatForSubdomain($input)
    {
        // Convert to lowercase
        $subdomain = Str::lower($input);
    
        // Replace spaces and underscores with hyphens
        $subdomain = Str::replace([' ', '_'], '', $subdomain);
    
        // Remove any characters that are not alphanumeric or hyphens
        $subdomain = preg_replace('/[^a-z0-9-]/', '', $subdomain);
    
        // Trim leading and trailing hyphens
        $subdomain = trim($subdomain, '-');
    
        return $subdomain;
    }

    public function createTenant(Request $request)
    {

        //try {
            //Code that may throw an Exception
        
        $this->validate($request, [
            'business_email' => 'required|unique:users,email',
            'business_name' => 'required',
            'subdomain' => 'required|unique:domains,domain|unique:tenants,id',
        ]);


        $subdomain = $this->formatForSubdomain($request->subdomain);
        $tenant = Tenant::create([
            'id' =>$subdomain,
        ]);

        $tenant->domains()->create(['domain' => $subdomain]);

        $kyc = Kyc::create([
            'tenant_id' => $tenant->id,
            'business_name' => $request->business_name,
            'business_email' => $request->business_email,
            'contact_email' => $request->business_email,
            'contact_name' => 'set this',
            'business_phone' => $request->business_email,
            'contact_phone' => $request->business_email,
            'status' => 'Active',
            'current_plan' =>$request->plan ?? 1,
            'country' => $request->country,
            'website' => $request->website,
            'about' => 'set this',
        ]);

        //$password = 'victor@358';
        $password = Str::password(9, true, true, false, false);
        $password_hash = Hash::make($password);
        $website = $subdomain . '.' . env('TENANT_ROOT_URL');

        $user = User::create([
            'name' => $request->business_name,
            'email' => $request->business_email,
            'password' => $password_hash,
        ]);

        $role = Role::where('name', 'tenant')->first();
        $user->assignRole($role);

        $user->tenants()->attach($tenant);

        //createsubscription

        $plan = Plan::find(1)->first();
        $subscription = Subscription::create([
            'user_id' => $user->id,
            'tenant_id' => $subdomain,
            'plan_id' => $request->plan ?? 1,
            'status' => 'active',
            'start_date' => Carbon::today(),
            'end_date' => Carbon::now()->addDays($plan->free_days), //Carbon::now()->addMonth(),
            'trial_ends_at' => Carbon::now()->addDays($plan->free_days),
            'next_billing_date' => Carbon::now()->addDays($plan->free_days),
            'cancel_at' => null,
            'canceled_at' => null,
            'renewal' => 1,
            'price' => $plan->cost,
            'currency' => 'USD',
        ]);

        Tenancy::initialize($tenant);
        // Register the user on the tenant's database
        $tenantUser = User::create([
            'name' => $request->business_name,
            'email' => $request->business_email,
            'password' => $password_hash,
        ]);

        $role = Role::where('name', 'merchant')->first();
        $tenantUser->assignRole($role);
        Tenancy::end();

        if(env('APP_ENV') == 'production') 
        {
            $subdomainCreatedOnServer = $this->subdomainapi($subdomain);
        }
        

        Mail::to($user->email)->queue(new WelcomeTenant($user,$password, $website));

        return redirect()->route('tenantCreated');

   //} catch (Exception $e) {
   //     FacadesLog::debug($e->getMessage());
    //    return redirect()->route('error');
   // }
        
    }
    

    public function subdomainapi($subdomain){
        $user = 'tracklia';
        $pass = 'Victor@358@1616';
        $host = 'tracklia.com';
        
        $url = 'https://'.rawurlencode($user).':'.rawurlencode($pass).'@'.$host.':2003/index.php?api=json&act=domainadd'; 

        $post = array('add' => '1',
                'domain_type' => 'subdomain',
                'domain' => 'tracklia.com',
                'domainpath' => 'public_html',
                'wildcard' => 0,
                'issue_lecert' => 1,
                'subdomain' => $subdomain,
        );

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

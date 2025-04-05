<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\CreateTenantJob;
use App\Mail\NewTenant;
use App\Mail\WelcomeTenant;
use App\Models\Currency;
use App\Models\Kyc;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\Subscriptiontracker;
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
use Illuminate\Support\Facades\Http;
use App\Rules\Recaptcha;

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
        $disallowedDomains = [
            'gmail.com', 'yahoo.com', 'hotmail.com', 'outlook.com', 
            'aol.com', 'icloud.com', 'protonmail.com'
        ];
    
        $request->validate([
            'business_email' => ['required','unique:users,email',function ($attribute, $value, $fail) use ($disallowedDomains) {
                $domain = substr(strrchr($value, "@"), 1);
                if (in_array($domain, $disallowedDomains)) {
                    $fail('Registration using public email addresses is not allowed.');
                }
            }],
            'business_name' => 'required',
            'subdomain' => 'required|unique:domains,domain|unique:tenants,id',
        ]);
    
        if ($request->filled('username')) {
            return redirect()->back()->withErrors(['error' => 'Bot detected!']);
        }

        $data = $request->only([
            'business_email',
            'business_name',
            'subdomain',
            'plan',
            'country',
            'website',
        ]);
    
        CreateTenantJob::dispatch($data);
    
        return redirect()->route('tenantCreated');
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
                'issue_lecert' => '1',
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

    public function certapi($subdomainCert){
        $user = 'tracklia';
        $pass = 'Victor@358@1616';
        $host = 'tracklia.com';
        
        $url = 'https://'.rawurlencode($user).':'.rawurlencode($pass).'@'.$host.':2003/index.php?api=json&act=acme'; 

        $post = array('install_cert' => '1',
              'domain' => [$subdomainCert]
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

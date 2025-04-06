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

    public function tenantCreated($sub = null)
    {
        if($sub){
            return view('frontpages.tenantCreated', compact('sub'));
        }

        //return redirect()->back()->with('message', 'Invalid information');
        
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
            'subdomain' => 'required|unique:domains,domain|unique:tenants,id|max:63',
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
        $webSite = $data['subdomain'];
    
        return redirect()->route('tenantCreated',['sub' => $webSite]  );
    }
    
}

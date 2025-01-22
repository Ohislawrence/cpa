<?php

namespace App\Jobs;

use App\Models\Tenant;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\WelcomeTenant;
use App\Models\Currency;
use App\Models\Kyc;
use App\Models\Plan;
use App\Models\Subscription;
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

class CreateTenantJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $data;
    public $subdomain;

    public function __construct(array $data, $subdomain)
    {
        $this->data = $data;
        $this->subdomain = $subdomain;    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        try {

        
        $tenant = Tenant::create([
            'id' =>$this->subdomain,
        ]);

        $tenant->domains()->create(['domain' => $this->subdomain]);
        $plan = $this->data['plan'] ?? 1;

        $kyc = Kyc::create([
            'tenant_id' => $tenant->id,
            'business_name' => $this->data['business_name'],
            'business_email' => $this->data['business_email'],
            'contact_email' => $this->data['business_email'],
            'contact_name' => 'set this',
            'business_phone' => $this->data['business_email'],
            'contact_phone' => $this->data['business_email'],
            'status' => 'Active',
            'current_plan' =>$plan,
            'country' => $this->data['country'],
            'website' => $this->data['website'],
            'about' => 'set this',
        ]);

        //$password = 'victor@358';
        $password = Str::password(9, true, true, false, false);
        $password_hash = Hash::make($password);
        $website = $this->subdomain . '.' . env('TENANT_ROOT_URL');

        $user = User::create([
            'name' => $this->data['business_name'],
            'email' => $this->data['business_email'],
            'password' => $password_hash,
        ]);

        $role = Role::where('name', 'tenant')->first();
        $user->assignRole($role);

        $user->tenants()->attach($tenant);

        //createsubscription

        $plan = Plan::find($plan)->first();

        $subscription = Subscription::create([
            'user_id' => $user->id,
            'tenant_id' => $this->subdomain,
            'plan_id' => $this->data['plan'] ?? 1,
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
            'name' => $this->data['business_name'],
            'email' => $this->data['business_email'],
            'password' => $password_hash,
        ]);

        $role = Role::where('name', 'merchant')->first();
        $tenantUser->assignRole($role);
        Tenancy::end();

    
        Mail::to($user->email)->queue(new WelcomeTenant($user,$password, $website));

    } catch (\Exception $e) {
        
    }
    }

    
}

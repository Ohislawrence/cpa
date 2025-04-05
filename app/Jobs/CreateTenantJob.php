<?php

namespace App\Jobs;

use App\Models\Tenant;
use App\Models\User;
use App\Models\Kyc;
use App\Models\Plan;
use App\Models\Role;
use App\Mail\WelcomeTenant;
use App\Mail\NewTenant;
use App\Models\Subscriptiontracker;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Sleep;
use Spatie\Permission\Models\Role as ModelsRole;
use Stancl\Tenancy\Facades\Tenancy;

class CreateTenantJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function formatForSubdomain($input)
    {
        $subdomain = Str::lower($input);
        $subdomain = Str::replace([' ', '_'], '', $subdomain);
        $subdomain = preg_replace('/[^a-z0-9-]/', '', $subdomain);
        $subdomain = trim($subdomain, '-');
        return $subdomain;
    }

    public function handle()
    {
        try {
            $data = $this->data;
            //$request = $this->request;
            $subdomain = $this->formatForSubdomain($data['subdomain']);
            $tenant = Tenant::create(['id' => $subdomain]);
            $tenant->domains()->create(['domain' => $subdomain]);

            if (env('APP_ENV') == 'production') {
                $subdomainCert = $subdomain.'.tracklia.com';
                $this->subdomainapi($subdomain);
                Sleep::for(30)->seconds();
                $this->certapi($subdomainCert);
            }

            $kyc = Kyc::create([
                'tenant_id' => $tenant->id,
                'business_name' => $data['business_name'],
                'business_email' => $data['business_email'],
                'contact_email' => $data['business_email'],
                'contact_name' => 'set this',
                'business_phone' => $data['business_email'],
                'contact_phone' => $data['business_email'],
                'status' => 'Active',
                'current_plan' => $data['plan'] ?? 1,
                'country' => $data['country'],
                'website' => $data['website'],
                'about' => 'set this',
            ]);

            $password = Str::password(9, true, true, false, false);
            $password_hash = Hash::make($password);
            $website = $subdomain . '.' . env('TENANT_ROOT_URL');

            $user = User::create([
                'name' => $data['business_name'],
                'email' => $data['business_email'],
                'password' => $password_hash,
            ]);

            $role = ModelsRole::where('name', 'tenant')->first();
            $user->assignRole($role);
            $user->tenants()->attach($tenant);

            $plan = Plan::find(1)->first();
            $user->createAsCustomer([
                'trial_ends_at' => now()->addDays($plan->free_days)
            ]);


            Tenancy::initialize($tenant);
                $tenantUser = User::create([
                    'name' => $data['business_name'],
                    'email' => $data['business_email'],
                    'password' => $password_hash,
                ]);
                $role = ModelsRole::where('name', 'merchant')->first();
                $tenantUser->assignRole($role);
            Tenancy::end();

            

            Mail::to($user->email)->queue(new WelcomeTenant($user, $password, $website));
            Mail::to('business@tracklia.com')->queue(new NewTenant());
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }

    public function subdomainapi($subdomain)
    {
        $user = 'tracklia';
        $pass = 'Victor@358@1616';
        $host = 'tracklia.com';

        $url = 'https://' . rawurlencode($user) . ':' . rawurlencode($pass) . '@' . $host . ':2003/index.php?api=json&act=domainadd';

        $post = [
            'add' => '1',
            'domain_type' => 'subdomain',
            'domain' => 'tracklia.com',
            'domainpath' => 'public_html',
            'wildcard' => 0,
            'issue_lecert' => '0',
            'subdomain' => $subdomain,
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));

        $resp = curl_exec($ch);
        if (!empty(curl_error($ch))) {
            echo curl_error($ch); die();
        }

        $res = json_decode($resp, true);
        return !empty($res['done']);
    }

    public function certapi($subdomainCert)
    {
        $user = 'tracklia';
        $pass = 'Victor@358@1616';
        $host = 'tracklia.com';

        $url = 'https://' . rawurlencode($user) . ':' . rawurlencode($pass) . '@' . $host . ':2003/index.php?api=json&act=acme';

        $post = [
            'install_cert' => '1',
            'domain' => [$subdomainCert]
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));

        $resp = curl_exec($ch);
        if (!empty(curl_error($ch))) {
            echo curl_error($ch); die();
        }

        $res = json_decode($resp, true);
        return !empty($res['done']);
    }
}

    


<?php

namespace App\Jobs;

use App\Models\Tenant;
use App\Models\User;
use App\Models\Kyc;
use App\Models\Plan;
use App\Mail\WelcomeTenant;
use App\Mail\NewTenant;
use App\Mail\TenantCreationFailed;
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
use Spatie\Permission\Models\Role;
use Stancl\Tenancy\Facades\Tenancy;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class CreateTenantJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3; // Number of retry attempts
    public $backoff = [30, 60, 120]; // Seconds between retries

    protected $data;

    public function __construct(array $data)
    {
        $this->data = $this->validateInput($data);
    }

    protected function validateInput(array $data): array
    {
        $validator = Validator::make($data, [
            'subdomain' => 'required|string|max:63|regex:/^[a-z0-9-]+$/',
            'business_name' => 'required|string|max:255',
            'business_email' => 'required|email|max:255',
            'country' => 'required|string|max:100',
            'website' => 'nullable|url|max:255',
            'plan' => 'nullable|integer|exists:plans,id',
            'contact_name' => 'nullable|string|max:255',
            'contact_phone' => 'nullable|string|max:20',
            'about' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            Log::error('Tenant creation validation failed', [
                'errors' => $validator->errors(),
                'input' => $data
            ]);
            throw new ValidationException($validator);
        }

        return $validator->validated();
    }

    public function formatForSubdomain(string $input): string
    {
        $subdomain = Str::lower($input);
        $subdomain = Str::replace([' ', '_'], '', $subdomain);
        $subdomain = preg_replace('/[^a-z0-9-]/', '', $subdomain);
        $subdomain = trim($subdomain, '-');
        
        if (strlen($subdomain) > 63) {
            $subdomain = substr($subdomain, 0, 63);
        }
        
        return $subdomain;
    }

    public function handle()
    {
        try {
            $data = $this->data;
            $subdomain = $this->formatForSubdomain($data['subdomain']);
            
            // Check if tenant already exists
            if (Tenant::where('id', $subdomain)->exists()) {
                throw new \Exception("Tenant with subdomain {$subdomain} already exists");
            }

            // Create tenant
            $tenant = Tenant::create(['id' => $subdomain]);
            $tenant->domains()->create(['domain' => $subdomain]);

            // Handle production environment setup
            //if (app()->environment('production')) {
                $this->setupProductionEnvironment($subdomain);
            //}

            // Create KYC record with proper data
            $kyc = $this->createKycRecord($tenant, $data);

            // Generate password and create user
            $password = Str::password(12, true, true, true, false);
            $password_hash = Hash::make($password);
            $website = $subdomain . '.' . env('TENANT_ROOT_URL');

            $user = $this->createSystemUser($data, $password_hash, $tenant);
            $this->assignUserRoles($user, $tenant, $password_hash);

            // Send notifications
            $this->sendNotifications($user, $password, $website);

        } catch (\Exception $e) {
            Log::error('Tenant creation failed: ' . $e->getMessage(), [
                'exception' => $e,
                'data' => $this->data
            ]);
            throw $e; // Re-throw to trigger retry mechanism
        }
    }

    protected function setupProductionEnvironment(string $subdomain): void
    {
        $subdomainCert = $subdomain.'.tracklia.com';
        
        // Queue subdomain creation as separate job with retries
        $subdomainCreated = retry(3, function() use ($subdomain) {
            return $this->subdomainapi($subdomain);
        }, 20000); // 20 seconds between retries

        if (!$subdomainCreated) {
            throw new \Exception("Failed to create subdomain {$subdomain}");
        }

        Sleep::for(30)->seconds();

        // Queue SSL certificate creation as separate job with retries
        $certCreated = retry(3, function() use ($subdomainCert) {
            return $this->certapi($subdomainCert);
        }, 30000); // 30 seconds between retries

        if (!$certCreated) {
            Log::warning("SSL certificate creation failed for {$subdomainCert}");
            // Continue without SSL rather than failing entire process
        }
    }

    protected function createKycRecord(Tenant $tenant, array $data): Kyc
    {
        return Kyc::create([
            'tenant_id' => $tenant->id,
            'business_name' => $data['business_name'],
            'business_email' => $data['business_email'],
            'contact_email' => $data['business_email'],
            'contact_name' => $data['contact_name'] ?? $data['business_name'],
            'business_phone' => $data['contact_phone'] ?? null,
            'contact_phone' => $data['contact_phone'] ?? null,
            'status' => 'Active',
            'current_plan' => $data['plan'] ?? $this->getDefaultPlanId(),
            'country' => $data['country'],
            'website' => $data['website'] ?? null,
            'about' => $data['about'] ?? 'No information provided',
        ]);
    }

    protected function getDefaultPlanId(): int
    {
        $plan = Plan::orderBy('id')->first();
        return $plan ? $plan->id : 1;
    }

    protected function createSystemUser(array $data, string $password_hash, Tenant $tenant): User
    {
        return User::create([
            'name' => $data['business_name'],
            'email' => $data['business_email'],
            'password' => $password_hash,
        ]);
    }

    protected function assignUserRoles(User $user, Tenant $tenant, string $password_hash): void
    {
        $role = Role::where('name', 'tenant')->firstOrFail();
        $user->assignRole($role);
        $user->tenants()->attach($tenant);

        $plan = Plan::find($this->data['plan'] ?? $this->getDefaultPlanId());
        $user->createAsCustomer([
            'trial_ends_at' => now()->addDays($plan->free_days)
        ]);

        Tenancy::initialize($tenant);
        try {
            $tenantUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'password' => $password_hash,
            ]);
            $roleTenant = Role::where('name', 'merchant')->firstOrFail();
            $tenantUser->assignRole($roleTenant);
        } finally {
            Tenancy::end();
        }
    }

    protected function sendNotifications(User $user, string $password, string $website): void
    {
        try {
            Mail::to($user->email)->queue(new WelcomeTenant($user, $password, $website));
            Mail::to('business@tracklia.com')->queue(new NewTenant($user));
        } catch (\Exception $e) {
            Log::error('Failed to send tenant creation notifications: ' . $e->getMessage());
        }
    }

    public function subdomainapi($subdomain)
    {
        $user = env('WebuzoUser');
        $pass = env('WebuzoPass');
        $host = env('WebuzoHost');

        if (empty($user) || empty($pass) || empty($host)) {
            throw new \Exception('Webuzo credentials not configured');
        }

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
        curl_setopt_array($ch, [
            CURLOPT_URL => $url,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_CONNECTTIMEOUT => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => http_build_query($post),
        ]);

        $resp = curl_exec($ch);
        
        if (curl_errno($ch)) {
            $error = curl_error($ch);
            curl_close($ch);
            throw new \Exception("Webuzo API error: {$error}");
        }

        curl_close($ch);
        $res = json_decode($resp, true);
        
        return !empty($res['done']);
    }

    public function certapi($subdomainCert)
    {
        $user = env('WebuzoUser');
        $pass = env('WebuzoPass');
        $host = env('WebuzoHost');

        if (empty($user) || empty($pass) || empty($host)) {
            throw new \Exception('Webuzo credentials not configured');
        }

        $url = 'https://' . rawurlencode($user) . ':' . rawurlencode($pass) . '@' . $host . ':2003/index.php?api=json&act=acme';

        $post = [
            'install_cert' => '1',
            'domain' => [$subdomainCert]
        ];

        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => $url,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_CONNECTTIMEOUT => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => http_build_query($post),
        ]);

        $resp = curl_exec($ch);
        
        if (curl_errno($ch)) {
            $error = curl_error($ch);
            curl_close($ch);
            throw new \Exception("Webuzo ACME API error: {$error}");
        }

        curl_close($ch);
        $res = json_decode($resp, true);
        
        return !empty($res['done']);
    }

    public function failed(\Exception $exception)
    {
        // Special handling if the job fails after all retries
        Log::critical('CreateTenantJob failed after retries', [
            'exception' => $exception,
            'data' => $this->data
        ]);
        
        // Notify admin about critical failure
        // Only send notification in production
        if (app()->environment('production')) {
            Mail::to('business@tracklia.com')
                ->cc('support@tracklia.com')
                ->send(new TenantCreationFailed($this->data, $exception));
        }
    }
}
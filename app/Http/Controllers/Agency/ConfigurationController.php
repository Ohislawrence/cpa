<?php

namespace App\Http\Controllers\Agency;

use App\Http\Controllers\Controller;
use App\Models\Configuration;
use App\Models\Currency;
use App\Models\Payoutoption;
use App\Models\Setting;
use App\Models\Timezone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Stancl\Tenancy\Database\Models\Domain;
use Stancl\Tenancy\Database\Models\Tenant;
use Illuminate\Support\Facades\Auth;

class ConfigurationController extends Controller
{
    public function index()
    { 
        $countries = Currency::all();
        $timezones = Timezone::all();
        $payoutMethods = Payoutoption::all();
        //currency
        $setCurrency = Currency::where('id', settings()->get('default_currency'))->first()->symbol;
        return view('agency.configuration', compact('countries','timezones','payoutMethods','setCurrency'));
    }

    public function updateOLD(Request $request)
    {
        // Validate request input
        $request->validate([
            'settings.logo' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'settings.*.value' => 'nullable|string|max:255', // Adjust rules as necessary
        ]);

        $settingsInput = $request->input('settings',[]);
        $logo = $request->file('settings.logo');
        $existingSettings = Configuration::whereIn('key', array_keys($settingsInput))->get()->keyBy('key');

        foreach ($settingsInput as $key => $data) {
            $setting = $existingSettings->get($key);

            if ($setting) {
                if ($setting->type === 'image' && $request->hasFile('settings.logo')) {
                    $file = $logo;
                    $tenantId = tenant()->id;
                    $filename = 'logo-' . time() . '.' . $file->extension();
                    $path = 'tenant'.$tenantId.$file->storeAs("logo/{$tenantId}/logo", $filename, 'tenant');
                    $value = $path;
                } else {
                    
                    $value =  $data ?? null;
                }

                if ($value !== null) {
                    
                    $setting->update(['value' => $value]);
                }
            } else {
                // Create a new setting if it doesn't exist
                Configuration::create([
                    'key' => $key,
                    'value' => $data['value'] ?? '',
                    'type' => $data['type'] ?? 'text',
                ]);
            }
        }
        
        
            
        

        return redirect()->back()->with('message', 'Settings updated successfully.');
    }

    public function update(Request $request){

        if ($request->logo) {
            $file = $request->logo;
            $tenantId = tenant()->id;
            $filename = 'logo-' . time() . '.' . $file->extension();
            $path = 'tenant'.$tenantId.'/'.$file->storeAs("logo/{$tenantId}", $filename, 'tenant');
            $value = $path;
            settings()->set('logo', $value);
        }

        if ($request->favicon) {
            $file = $request->favicon;
            $tenantId = tenant()->id;
            $filename = 'logo-' . time() . '.' . $file->extension();
            $path = 'tenant'.$tenantId.'/'.$file->storeAs("favicon/{$tenantId}", $filename, 'tenant');
            $value = $path;
            settings()->set('favicon', $value);
        }

        settings()->set([
            'site_name' => $request->site_name,
            'contact_email' => $request->contact_email,
            'support_email' => $request->support_email,
            'default_currency' => $request->default_currency,
            'timezone' => $request->timezone,
            'commission_rate' => $request->commission_rate,
            'cookie_lifetime_days' => $request->cookie_lifetime_days,
            'minimum_payout_amount'=> $request->minimum_payout_amount, 
            'payout_frequency' => $request->payout_frequency,
            'payout_methods' => $request->payout_methods,
            'affiliate_auto_approval' => $request->affiliate_auto_approval,
            'signup_bonus' => $request->signup_bonus,
            'terms_and_conditions' => $request->terms_and_conditions,
            'require_tax_info' => $request->require_tax_info,
            'new_affiliate_notification' => $request->new_affiliate_notification,
            'new_conversion_notification' => $request->new_conversion_notification,
            'payout_notification' => $request->payout_notification,
            'admin_notification_email' => $request->admin_notification_email,
            'allowed_countries' => $request->allowed_countries,
            'gdpr_compliance' => $request->gdpr_compliance,
            'secret' => $request->secret,
            'allow_affiliate_referral' => $request->allow_affiliate_referral,
            'allowed_affiliate_referral_payout_percentage'=> $request->allowed_affiliate_referral_payout_percentage,
            'allowed_affiliate_referral_duration_months'=> $request->allowed_affiliate_referral_duration_months,
            'allow_affiliate_registration' => $request->allow_affiliate_registration,
         ]);


        return redirect()->back()->with('message', 'Settings updated successfully.');
    }

    public function domainupdate(Request $request)
    {
        $tenant = tenant();

        //dd(tenant()->domains()->first()->changed);
        $validator = Validator::make($request->all(), [
            'custom_domain' => [
                'required',
                'regex:/^[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'
            ],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('message', 'Use the proper domain name format - e.g. business.yourname.com');
        }
        $newDomain = strtolower($request->custom_domain);
        $exists = Domain::where('domain', $newDomain)->where('tenant_id', '!=', $tenant->id)->exists();

        if ($exists) {
            return redirect()->back()->with('message', 'The domain you entered is not available for registration');
        }

        try {
            // Remove the old domain(no need)
            //Domain::where('tenant_id', $tenant->id)->delete();

            // Attach the new domain
            $tenant->domains()->update([
                'domain' => $newDomain,
                'changed' =>'1',
            ]);

            return redirect()->back()->with('message', 'Domain updated successfully.');

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to update domain. ' . $e->getMessage()
            ], 500);
        }
    }

}

<?php

namespace App\Http\Controllers\Agency;

use App\Http\Controllers\Controller;
use App\Models\Configuration;
use App\Models\Currency;
use App\Models\Setting;
use App\Models\Timezone;
use Illuminate\Http\Request;

class ConfigurationController extends Controller
{
    public function index()
    { 
        $countries = Currency::all();
        $timezones = Timezone::all();
        return view('agency.configuration', compact('countries','timezones'));
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

}

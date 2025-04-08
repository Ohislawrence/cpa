<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CookieConsentController extends Controller
{
    public function acceptAll()
    {
        $consent = [
            'essential' => true,
            'performance' => true,
            'analytics' => true,
            'marketing' => true,
        ];

        return $this->setConsentCookie($consent)
            ->back()
            ->with('cookie_success', 'Cookie preferences saved.');
    }

    public function rejectAll()
    {
        $consent = [
            'essential' => true, // Essential cookies cannot be rejected
            'performance' => false,
            'analytics' => false,
            'marketing' => false,
        ];

        return $this->setConsentCookie($consent)
            ->back()
            ->with('cookie_success', 'Cookie preferences saved.');
    }

    public function savePreferences(Request $request)
    {
        $consent = [
            'essential' => true,
            'performance' => $request->has('performance'),
            'analytics' => $request->has('analytics'),
            'marketing' => $request->has('marketing'),
        ];

        return $this->setConsentCookie($consent)
            ->back()
            ->with('cookie_success', 'Cookie preferences saved.');
    }

    protected function setConsentCookie($consent)
    {
        $minutes = config('cookies.expiration') * 1440; // Convert days to minutes
        $cookie = Cookie::make(
            config('cookies.cookie_name'),
            json_encode($consent),
            $minutes,
            '/',
            null,
            false,
            false
        );

        return response()->make()->withCookie($cookie);
    }
}
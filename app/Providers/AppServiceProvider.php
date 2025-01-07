<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);

        if (\Schema::hasTable('configurations')) { // Ensure the table exists
            $settings = Setting::all();
            foreach ($settings as $setting) {
                Config::set($setting->key, $setting->value);
            }
        }

    }
}

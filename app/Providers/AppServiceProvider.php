<?php

namespace App\Providers;

use App\Models\Setting;
use App\Services\FlutterwaveService;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(FlutterwaveService::class, function ($app) {
            return new FlutterwaveService();
        });
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

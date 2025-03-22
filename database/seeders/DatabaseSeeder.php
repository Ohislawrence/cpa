<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('settings')->insert([
            ['name' => 'site_name', 'val' => NULL],
            ['name' => 'favicon', 'val' => NULL],
            ['name' => 'contact_email', 'val' => NULL],
            ['name' => 'support_email', 'val' => NULL],
            ['name' => 'default_currency', 'val' => '2'],
            ['name' => 'timezone', 'val' => NULL],
            ['name' => 'commission_rate', 'val' => NULL],
            ['name' => 'cookie_lifetime_days', 'val' => NULL],
            ['name' => 'minimum_payout_amount', 'val' => 50],
            ['name' => 'payout_frequency', 'val' => NULL],
            ['name' => 'payout_methods', 'val' => NULL],
            ['name' => 'affiliate_auto_approval', 'val' => 'yes'],
            ['name' => 'signup_bonus', 'val' => NULL],
            ['name' => 'terms_and_conditions', 'val' => NULL],
            ['name' => 'require_tax_info', 'val' => NULL],
            ['name' => 'new_affiliate_notification', 'val' => NULL],
            ['name' => 'new_conversion_notification', 'val' => NULL],
            ['name' => 'payout_notification', 'val' => NULL],
            ['name' => 'admin_notification_email', 'val' => NULL],
            ['name' => 'allowed_countries', 'val' => NULL],
            ['name' => 'gdpr_compliance', 'val' => NULL],
            ['name' => 'logo', 'val' => NULL],
            ['name' => 'secret', 'val' => ''],
            ['name' => 'allow_affiliate_referral', 'val' => '0'],
            ['name' => 'allowed_affiliate_referral_payout_percentage', 'val' => '10'],
            ['name' => 'allowed_affiliate_referral_duration_months', 'val' => '0'],
            ['name' => 'allow_affiliate_registration', 'val' => '1']
        ]);


        


        DB::table('roles')->insert([
            ['name'=>'merchant', 'guard_name'=>'web'], 
            ['name'=>'affiliate', 'guard_name'=>'web'], 
            ['name'=>'staff', 'guard_name'=>'web'], 
        ]);

        

        DB::table('categories')->insert([
            ['id' => 1, 'name' => 'App', 'slug' => 'app', 'created_at' => null, 'updated_at' => null],
            ['id' => 2, 'name' => 'Cams', 'slug' => 'cams', 'created_at' => null, 'updated_at' => null],
            ['id' => 3, 'name' => 'Crypto', 'slug' => 'crypto', 'created_at' => null, 'updated_at' => null],
            ['id' => 4, 'name' => 'Dating', 'slug' => 'dating', 'created_at' => null, 'updated_at' => null],
            ['id' => 5, 'name' => 'Download', 'slug' => 'download', 'created_at' => null, 'updated_at' => null],
            ['id' => 6, 'name' => 'eCommerce', 'slug' => 'ecommerce', 'created_at' => null, 'updated_at' => null],
            ['id' => 7, 'name' => 'Education', 'slug' => 'education', 'created_at' => null, 'updated_at' => null],
            ['id' => 8, 'name' => 'Finance', 'slug' => 'finance', 'created_at' => null, 'updated_at' => null],
            ['id' => 9, 'name' => 'Gambling', 'slug' => 'gambling', 'created_at' => null, 'updated_at' => null],
            ['id' => 10, 'name' => 'Gaming', 'slug' => 'gaming', 'created_at' => null, 'updated_at' => null],
            ['id' => 11, 'name' => 'Health', 'slug' => 'health', 'created_at' => null, 'updated_at' => null],
            ['id' => 12, 'name' => 'Onlyfans', 'slug' => 'onlyfans', 'created_at' => null, 'updated_at' => null],
            ['id' => 13, 'name' => 'Travels', 'slug' => 'travels', 'created_at' => null, 'updated_at' => null],
            ['id' => 14, 'name' => 'Others', 'slug' => 'others', 'created_at' => null, 'updated_at' => null],
        ]);

        
    }
}

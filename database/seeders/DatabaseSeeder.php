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
        DB::table('configurations')->insert([
            ['key' => 'contact_email', 'value' => 'NULL'],
            ['key' => 'support_email', 'value' => 'NULL'],
            ['key' => 'default_currency', 'value' => '2'],
            ['key' => 'timezone', 'value' => 'NULL'],
            ['key' => 'commission_rate', 'value' => 'NULL'],
            ['key' => 'cookie_lifetime_days', 'value' => 'NULL'],
            ['key' => 'minimum_payout_amount', 'value' => 'NULL'],
            ['key' => 'payout_frequency', 'value' => 'NULL'],
            ['key' => 'payout_methods', 'value' => 'NULL'],
            ['key' => 'affiliate_auto_approval', 'value' => 'NULL'],
            ['key' => 'signup_bonus', 'value' => 'NULL'],
            ['key' => 'terms_and_conditions', 'value' => 'NULL'],
            ['key' => 'require_tax_info', 'value' => 'NULL'],
            ['key' => 'new_affiliate_notification', 'value' => 'NULL'],
            ['key' => 'new_conversion_notification', 'value' => 'NULL'],
            ['key' => 'payout_notification', 'value' => 'NULL'],
            ['key' => 'admin_notification_email', 'value' => 'NULL'],
            ['key' => 'allowed_countries', 'value' => 'NULL'],
            ['key' => 'gdpr_compliance', 'value' => 'NULL'],
            ['key' => 'logo', 'value' => 'NULL'],
        ]);


        DB::table('currencies')->insert([
            ['country'=>'Albania', 'currency'=>'Leke', 'code'=>'ALL', 'symbol'=>'Lek'], 
            ['country'=>'America', 'currency'=>'Dollars', 'code'=>'USD', 'symbol'=>'$'], 
            ['country'=>'Afghanistan', 'currency'=>'Afghanis', 'code'=>'AFN', 'symbol'=>'؋'],
            ['country'=>'Argentina', 'currency'=>'Pesos', 'code'=>'ARS', 'symbol'=>'$'],
            ['country'=>'Aruba', 'currency'=>'Guilders', 'code'=>'AWG', 'symbol'=>'ƒ'], 
            ['country'=>'Australia', 'currency'=>'Dollars', 'code'=>'AUD', 'symbol'=>'$'], 
            ['country'=>'Azerbaijan', 'currency'=>'New Manats', 'code'=>'AZN', 'symbol'=>'ман'],
            ['country'=>'Bahamas', 'currency'=>'Dollars', 'code'=>'BSD', 'symbol'=>'$'], 
         
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

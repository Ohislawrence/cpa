<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomainOrSubdomain;
use Stancl\Tenancy\Middleware\InitializeTenancyBySubdomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

use App\Http\Controllers\Admin\ClicksController;
use App\Http\Controllers\Admin\CreatetenantController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\EmailControler;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\PaymentsController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\TransactionController as AdminTransactionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Affiliate\DashboardController;
use App\Http\Controllers\Affiliate\OfferController as AffiliateOfferController;
use App\Http\Controllers\Affiliate\PaymentController;
use App\Http\Controllers\Affiliate\ProfileController;
use App\Http\Controllers\Affiliate\PromotionalController;
use App\Http\Controllers\Affiliate\ReferralController;
use App\Http\Controllers\Affiliate\RegistrationController;
use App\Http\Controllers\Agency\DashboardController as AgencyDashboardController;
use App\Http\Controllers\Agency\OfferController as AgencyOfferController;
use App\Http\Controllers\Agency\ProfileController as AgencyProfileController;
use App\Http\Controllers\Agency\ReportController;
use App\Http\Controllers\Agency\TransactionController;
use App\Http\Controllers\Agency\AffiliateController;
use App\Http\Controllers\Agency\ConfigurationController;
use App\Http\Controllers\Agency\EmailController;
use App\Http\Controllers\Agency\MassPaymentController;
use App\Http\Controllers\Agency\PayoutController as AgencyPayoutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ClickController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\WebhookController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Sitemap\SitemapGenerator;
use Stancl\Tenancy\Middleware\IdentificationMiddleware;
use Stancl\Tenancy\Middleware\ScopeSessions;

use function Laravel\Prompts\alert;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/
//Route::get('/', [FrontController::class, 'home'])->name('home');

//Route::get('login/test', [FrontController::class, 'logintest'])->name('login.test');

//Route::post('login/post/check', [FrontController::class, 'login'])->name('login.check.post');

Route::middleware([
    InitializeTenancyBySubdomain::class,
    PreventAccessFromCentralDomains::class,
    ScopeSessions::class,
])->group(function () {

//redirect to affiate
    Route::get('/', function () {
        return redirect(route('dashboard'));
        });
 
    Route::get('dashboard', function () {
        if(Auth::user()->hasRole('affiliate')){
             return redirect(route('affiliate.dashboard'));
         }
         elseif(Auth::user()->hasRole('merchant')){
             return redirect(route('merchant.dashboard'));
         }
         else{
             return redirect(route('home'));
         }
            
     })->name('dashboard');



    Route::middleware([
        'web',
        'auth',
    ])->group(function () {

   
    


    //general profile
    Route::get('/profile', function () {
        return view('Profile');
    })->name('profile');


//Affiliate
    Route::group([
        'namespace' => 'App\Http\Controllers\Affiliate',
        'prefix' => 'affiliate',
        'middleware' => 'role:affiliate',
        'as' => 'affiliate.',
        
    ], function () {
        Route::get('profile' , [ProfileController::class, 'index'])->name('myprofile');
        Route::get('offers', [AffiliateOfferController::class, 'index'])->name('offer');
        Route::get('offers/view/all', [AffiliateOfferController::class, 'viewoffers'])->name('viewoffers');
        Route::get('offers/{id}/view', [AffiliateOfferController::class, 'thisoffer'])->name('thisoffer');
        Route::get('dashboard', [DashboardController::class, 'dashboardone'])->name('dashboard');
        Route::get('dashboard/statistics', [DashboardController::class, 'dashboardtwo'])->name('statistics');
        Route::post('dashboard/getclickchart', [DashboardController::class, 'showclickchart'])->name('showclickchart');
        Route::get('dashboard/stat/getdata', [DashboardController::class, 'getUserClicks'])->name('getUserClicks');
        Route::get('payments', [PaymentController::class, 'index'])->name('payments');
        Route::get('payments/getpaymentdata', [PaymentController::class, 'getpaymentdata'])->name('getpaymentdata');
        Route::post('payments/post/requestpayment', [PaymentController::class, 'requestpayment'])->name('requestpayment');
        Route::get('referral', [ReferralController::class, 'index'])->name('referral');
        Route::get('offers/smartlink', [AffiliateOfferController::class, 'ailink'])->name('ailink');
        Route::get('promotions/assets', [PromotionalController::class, 'marketingassets'])->name('marketingassets');
        Route::get('promotions/apis', [PromotionalController::class, 'apis'])->name('apis');

    });

//merchant
    Route::group([
        'namespace' => 'App\Http\Controllers\Agency',
        'prefix' => 'merchant',
        'middleware' => 'role:merchant',
        'as' => 'merchant.',
    ], function () {
        Route::get('profile', [AgencyProfileController::class, 'index'])->name('profile');
        Route::get('dashboard', [AgencyDashboardController::class, 'index'])->name('dashboard');
        //campaigns
        Route::get('campaigns', [AgencyOfferController::class, 'index'])->name('campaigns');
        Route::get('campaigns/data', [AgencyOfferController::class, 'getStats'])->name('getStats');
        Route::get('campaign/create', [AgencyOfferController::class, 'create'])->name('create.campaign');
        Route::post('campaign/create/post', [AgencyOfferController::class, 'store'])->name('store.campaign.post');
        Route::get('campaign/view', [AgencyOfferController::class, 'viewcampaign'])->name('viewcampaign.campaign');
        Route::get('campaign/details/{id}/view', [AgencyOfferController::class, 'campaigndetails'])->name('details.campaign');
        Route::get('campaign/details/{id}/stats', [AgencyOfferController::class, 'campaignstats'])->name('details.campaigndestats');
        //affiliates
        Route::get('reports', [ReportController::class, 'index'])->name('reports');
        Route::get('transaction', [TransactionController::class, 'index'])->name('transaction');
        Route::get('affiliates', [AffiliateController::class, 'index'])->name('affiliates');
        //affiliate profile
        Route::get('affiliate/settings', [AffiliateController::class, 'settings'])->name('affiliates.settings');
        Route::get('affiliates/get/all', [AffiliateController::class, 'getusers'])->name('getusers');
        Route::get('affiliates/{id}/get', [AffiliateController::class, 'getuserclickstats'])->name('getuserclickstats');
        Route::get('transaction/all/transaction', [TransactionController::class, 'getusertransaction'])->name('all.getusertransaction');
        Route::get('affiliates/{id}/getusertransaction', [AffiliateController::class, 'getusertransaction'])->name('getusertransaction');
        Route::get('affiliates/{id}/gettrafficsource', [AffiliateController::class, 'gettrafficsource'])->name('gettrafficsource');
        Route::get('affiliates/{id}/request', [AffiliateController::class, 'getpaymentrequest'])->name('getpaymentrequest');
        Route::get('affiliates/request/forall', [AffiliateController::class, 'getpaymentrequestforall'])->name('getpaymentrequestforall');
        Route::get('affiliate/{id}/overview', [AffiliateController::class, 'overview'])->name('affiliate.overview');
        Route::get('affiliate/{id}/clicks/stats', [AffiliateController::class, 'clickstats'])->name('affiliate.clickstats');
        Route::get('affiliate/{id}/clicks/request', [AffiliateController::class, 'paymentrequest'])->name('affiliate.paymentrequest');
        Route::get('affiliate/{id}/all/transactions', [AffiliateController::class, 'transactions'])->name('affiliate.transactions');
        Route::get('affiliate/{id}/referrals', [AffiliateController::class, 'referrals'])->name('affiliate.referrals');
        Route::get('affiliate/{id}/updateuserdetails', [AffiliateController::class, 'updateuserdetails'])->name('affiliate.updateuserdetails');
        Route::put('affiliate/{id}/updateuser', [AffiliateController::class, 'updateuser'])->name('affiliate.updateuser');
        Route::get('affiliate/{id}/transactions', [AffiliateController::class, 'transactions'])->name('affiliate.transactions');
        Route::get('affiliate/{id}/trafficsource', [AffiliateController::class, 'trafficsource'])->name('affiliate.trafficsource');
        Route::post('affiliate/{id}/trafficsource/post', [AffiliateController::class, 'traffic'])->name('affiliate.traffic');
        Route::post('affiliate/create/new/post', [AffiliateController::class, 'createaffiliate'])->name('affiliate.createaffiliate');
        Route::delete('affiliate/{id}/trafficsource/delete', [AffiliateController::class, 'trafficsourcedestroy'])->name('affiliate.trafficsourcedestroy');
        //payouts
        Route::get('payouts/request', [AgencyPayoutController::class, 'index'])->name('payout.request');
        Route::get('payouts/options', [AgencyPayoutController::class, 'options'])->name('payout.option');
        Route::post('payouts/paypal/details', [AgencyPayoutController::class, 'storePaypalDetails'])->name('payout.option.storePaypalDetails');
        Route::post('mass/payouts/paypal/all', [MassPaymentController::class, 'processMassPayment'])->name('payout.option.processMassPayment');
        //settings
        Route::get('setting/configuration', [ConfigurationController::class, 'index'])->name('configuration');
        Route::post('setting/configuration/post', [ConfigurationController::class, 'update'])->name('configuration.update');
        //emails
        Route::get('email/send', [EmailController::class, 'send'])->name('email.send');
        Route::get('email/sent/all', [EmailController::class, 'showSentMessages'])->name('email.showSentMessages');
        Route::get('email/sent/get/sent', [EmailController::class, 'getsentMessages'])->name('email.getsentMessages');
        Route::get('email/settings', [EmailController::class, 'settings'])->name('email.settings');
        Route::post('email/settings/save', [EmailController::class, 'updateEmailSettings'])->name('email.updateEmailSettings');
        Route::post('email/send/all', [EmailController::class, 'sendEmail'])->name('email.sendEmail');
        Route::get('email/systememail', [EmailController::class, 'systememail'])->name('email.systememail');

    });
    
});
});

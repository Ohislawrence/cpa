<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomainOrSubdomain;
use Stancl\Tenancy\Middleware\InitializeTenancyBySubdomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;


use App\Http\Controllers\Affiliate\DashboardController;
use App\Http\Controllers\Affiliate\OfferController as AffiliateOfferController;
use App\Http\Controllers\Affiliate\PaymentController;
use App\Http\Controllers\Affiliate\ProfileController;
use App\Http\Controllers\Affiliate\PromotionalController;
use App\Http\Controllers\Affiliate\ReferralController;
use App\Http\Controllers\Affiliate\RegistrationController;
use App\Http\Controllers\Affiliate\ReportController as AffiliateReportController;
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
use App\Http\Controllers\Agency\SubscribeController;
use App\Http\Controllers\Agency\TierController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ClickController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SmartlinkController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\WebhookController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Sitemap\SitemapGenerator;
use Stancl\Tenancy\Middleware\IdentificationMiddleware;
use Stancl\Tenancy\Middleware\ScopeSessions;
use function Laravel\Prompts\alert;
use Illuminate\Http\Request;

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


Route::middleware([
    'web',
    InitializeTenancyByDomainOrSubdomain::class,
    PreventAccessFromCentralDomains::class,
    ScopeSessions::class,
])->group(function () {

    //all offer clicks comes thru here
    Route::get('offer', [ClickController::class, 'toOffer'])->name('offer');

    //offer webhooks
    //Route::webhooks('webhook-verify-action');
    Route::post('verify-action-taken',[WebhookController::class, 'handle']);


    Route::get('login', function () {
        return redirect(route('login.test'));
        })->name('login');
    
    //login custom
    Route::get('app/login', [FrontController::class, 'logintest'])->name('login.test');
    Route::post('login/post/check', [FrontController::class, 'login'])->name('login.check.post');
    //password reset
    Route::get('password/reset', [FrontController::class, 'passwordreset'])->name('password.reset');
    Route::post('post/password/reset', [FrontController::class, 'passwordresetpost'])->name('password.reset.post');
    Route::get('reset/password/url', [FrontController::class, 'passwordreseturl'])->name('url.password.reset');
    Route::post('reset/final/post', [FrontController::class, 'passwordresetfinalpost'])->name('final.password.reset');

    Route::get('register', function () {
        return redirect(route('affiliatereg'));
        });
    //affiliate registration
    Route::get('signup/affiliate', [RegistrationController::class, 'index'])->name('affiliatereg');
    Route::post('signup/affiliate/post', [RegistrationController::class, 'postaffiliate'])->name('affiliateregPost');

    Route::get('signup/affiliate/invite/{code}', [RegistrationController::class, 'invite'])->name('affiliatereginvite');
    //Route::post('signup/affiliate/post/invite', [RegistrationController::class, 'postaffiliateinvite'])->name('affiliateregPostinvite');

//redirect to affliate
    Route::get('/', function () {
        return redirect(route('dashboard'));
        });
 

    Route::middleware([
        'auth',
        'check.subscription',
    ])->group(function () {

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
    

    //logout
    Route::post('logingout/logout', [FrontController::class, 'logout'])->name('logout.post');

    //general profile
    //Route::get('/profile', function () {
    //    return view('Profile');
    //})->name('profile');


//Affiliate
    Route::group([
        'namespace' => 'App\Http\Controllers\Affiliate',
        'prefix' => 'affiliate',
        'middleware' => ['role:affiliate', 'checkAffiliateStatus'],
        'as' => 'affiliate.',
        
    ], function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('dashboard/stat/getdata', [DashboardController::class, 'topcampaignsDash'])->name('topcampaigns.affiliates');

        Route::get('profile' , [ProfileController::class, 'index'])->name('myprofile');
        Route::get('profile/edit' , [ProfileController::class, 'edit'])->name('edit');
        Route::post('profile/edit' , [ProfileController::class, 'editPost'])->name('profile.edit');
        Route::post('profile/payemdatils/edit' , [ProfileController::class, 'editPaymentdetails'])->name('payment.details');
        Route::post('profile/edit/password' , [ProfileController::class, 'editpasswordPost'])->name('profile.edit.password');
        Route::post('profile/traffic/source' , [ProfileController::class, 'trafficsource'])->name('trafficsource');
        Route::get('my/profile/traffic/source' , [ProfileController::class, 'gettrafficsource'])->name('gettrafficsource');
        Route::get('signup-check' , [ProfileController::class, 'thankyouapproval'])->name('thankyouapproval');

        Route::get('offers', [AffiliateOfferController::class, 'index'])->name('offer');
        Route::get('offers/view/all', [AffiliateOfferController::class, 'viewoffers'])->name('viewoffers');
        Route::get('offers/{id}/view', [AffiliateOfferController::class, 'thisoffer'])->name('thisoffer');

        //reports
        Route::get('report', [AffiliateReportController::class, 'report'])->name('reports');
        Route::get('report/getreportdata', [AffiliateReportController::class, 'getReportData'])->name('report.data');
        Route::get('report/getdata/tabledata', [AffiliateReportController::class, 'getDatatableData'])->name('report.datatable');
        
        //payments
        Route::get('payments', [PaymentController::class, 'index'])->name('payments');
        Route::get('payments/getpaymentdata', [PaymentController::class, 'getpaymentdata'])->name('getpaymentdata');
        Route::post('payments/post/requestpayment', [PaymentController::class, 'requestpayment'])->name('requestpayment');
       

        Route::get('referral', [ReferralController::class, 'index'])->name('referral');

        Route::get('promotions/assets', [PromotionalController::class, 'marketingassets'])->name('marketingassets');
        Route::get('promotions/apis', [PromotionalController::class, 'apis'])->name('apis');

        //number represents the id on feature table
        //smartlink(26)
        Route::middleware([
            'feature-access:26',
        ])->group(function () {
            Route::get('offers/smartlink', [AffiliateOfferController::class, 'ailink'])->name('ailink');
        });

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
        Route::get('topcampaignsDash/view/table', [AgencyDashboardController::class, 'topcampaignsDash'])->name('topcampaignsDash');
        //campaigns
        Route::get('campaigns', [AgencyOfferController::class, 'index'])->name('campaigns');
        Route::get('campaigns/data', [AgencyOfferController::class, 'getStats'])->name('getStats');
        Route::get('campaign/create', [AgencyOfferController::class, 'create'])->name('create.campaign');
        Route::post('campaign/create/post', [AgencyOfferController::class, 'store'])->name('store.campaign.post');
        Route::get('campaign/edit/{id}', [AgencyOfferController::class, 'edit'])->name('edit.campaign');
        Route::post('campaign/edit/post/{id}', [AgencyOfferController::class, 'update'])->name('update.campaign.post');
        Route::get('campaign/view', [AgencyOfferController::class, 'viewcampaign'])->name('viewcampaign.campaign');
        Route::get('campaign/details/{id}/view', [AgencyOfferController::class, 'campaigndetails'])->name('details.campaign');
        //Route::get('campaign/details/{id}/stats', [AgencyOfferController::class, 'campaignstats'])->name('details.campaigndestats');
        //Route::get('campaign/details/single/{id}/stats', [AgencyOfferController::class, 'singleGetStat'])->name('singleGetStat');
        Route::get('campaign/chart/single/charts/{offerId}', [AgencyOfferController::class, 'clicksChart'])->name('clicksChart');
        Route::get('campaign/details/single/{offerid}/clicks', [AgencyOfferController::class, 'viewClicksTable'])->name('viewClicksTable');
        //tier
        Route::get('tier/view', [TierController::class, 'index'])->name('tier.index');
        Route::get('tier/edit/{id}', [TierController::class, 'edit'])->name('tier.edit');
        Route::get('tier/table/data', [TierController::class, 'table'])->name('tier.get');
        Route::post('tier/create', [TierController::class, 'store'])->name('tier.create');
        Route::post('tier/update/{id}', [TierController::class, 'update'])->name('tier.update');
        Route::delete('tier/delete', [TierController::class, 'destroy'])->name('tier.delete');
        //reports
        Route::get('reports', [ReportController::class, 'index'])->name('reports');
        Route::get('report/data', [ReportController::class, 'getReportData'])->name('report.data');
        Route::get('report-datatable', [ReportController::class, 'getDatatableData'])->name('report.datatable');
        //affiliates
        //Route::get('unpaidcommissions', [TransactionController::class, 'index'])->name('unpaidCommissions');
        Route::get('affiliates', [AffiliateController::class, 'index'])->name('affiliates');
        Route::post('campaign/single/update/status', [AffiliateController::class, 'updateClickStatus'])->name('clicks.updateStatus');
        //affiliate profile
        //Route::get('affiliate/settings', [AffiliateController::class, 'settings'])->name('affiliates.settings');
        Route::get('affiliates/get/all', [AffiliateController::class, 'getusers'])->name('getusers');
        Route::get('affiliates/{id}/get', [AffiliateController::class, 'getuserclickstats'])->name('getuserclickstats');
        Route::get('transaction/all/transaction', [TransactionController::class, 'getusertransaction'])->name('all.getusertransaction');
        Route::get('affiliates/{id}/payouts/table', [AffiliateController::class, 'getuserPayout'])->name('getuserpayouts');
        Route::get('affiliates/{id}/gettrafficsource', [AffiliateController::class, 'gettrafficsource'])->name('gettrafficsource');
        Route::get('affiliates/{id}/referral/get', [AffiliateController::class, 'getreferrals'])->name('getreferrals');
        Route::get('affiliates/request/forall', [AffiliateController::class, 'getpaymentrequestforall'])->name('getpaymentrequestforall');
        Route::get('affiliate/{id}/overview', [AffiliateController::class, 'overview'])->name('affiliate.overview');
        Route::get('affiliate/{id}/clicks/overview/user', [AffiliateController::class, 'viewuserTopClicks'])->name('viewuserTopClicks');
        Route::get('affiliate/{id}/clicks/stats', [AffiliateController::class, 'clickstats'])->name('affiliate.clickstats');
        Route::get('affiliate/{id}/all/transactions', [AffiliateController::class, 'transactions'])->name('affiliate.transactions');
        Route::get('affiliate/{id}/referrals', [AffiliateController::class, 'referrals'])->name('affiliate.referrals');
        Route::get('affiliate/{id}/updateuserdetails', [AffiliateController::class, 'updateuserdetails'])->name('affiliate.updateuserdetails');
        Route::put('affiliate/{id}/updateuser', [AffiliateController::class, 'updateuser'])->name('affiliate.updateuser');
        Route::get('affiliate/{id}/payouts', [AffiliateController::class, 'payouts'])->name('affiliate.payouts');
        Route::get('affiliate/{id}/trafficsource', [AffiliateController::class, 'trafficsource'])->name('affiliate.trafficsource');
        Route::post('affiliate/{id}/trafficsource/post', [AffiliateController::class, 'traffic'])->name('affiliate.traffic');
        Route::post('affiliate/create/new/post', [AffiliateController::class, 'inviteaffiliate'])->name('affiliate.createaffiliate');
        Route::delete('affiliate/{id}/trafficsource/delete', [AffiliateController::class, 'trafficsourcedestroy'])->name('affiliate.trafficsourcedestroy');
        //Route::delete('/users/delete/{id}', [AffiliateController::class, 'deleteUser'])->name('users.delete');
        //payouts
        Route::get('payouts/all', [AgencyPayoutController::class, 'index'])->name('payout.all');
        Route::get('payouts/table/all', [AgencyPayoutController::class, 'getallPayout'])->name('table.getallPayout');
        Route::get('payouts/table/unpaidcommissions', [AgencyPayoutController::class, 'getallunpaidcommissionsTable'])->name('table.getallunpaidcommissionsTable');
        Route::get('payouts/table/batchpayouts', [AgencyPayoutController::class, 'getallbatchpayoutTable'])->name('table.batchpayout');
        Route::get('payouts/unpaidcommissions', [AgencyPayoutController::class, 'unpaidcommissions'])->name('payout.unpaidcommissions');
        Route::get('payouts/batchpayout', [AgencyPayoutController::class, 'batchpayout'])->name('payout.batch');
        Route::get('payouts/options', [AgencyPayoutController::class, 'options'])->name('payout.option');
        Route::post('payouts/paypal/details', [AgencyPayoutController::class, 'storePaypalDetails'])->name('payout.option.storePaypalDetails');
        Route::post('payouts/wise/details', [AgencyPayoutController::class, 'storeWiseDetails'])->name('payout.option.storeWiseDetails');
        Route::post('payouts/payoneer/details', [AgencyPayoutController::class, 'storePayoneerDetails'])->name('payout.option.storePayoneerDetails');
        Route::post('process-affiliate-payout/post', [MassPaymentController::class, 'processMassPayout'])->name('payout.option.processMassPayment');
        
        Route::post('paypal/batch/process/webhook', [MassPaymentController::class, 'batchPaypalWebhook'])->name('batchPaypalWebhook');
        Route::post('payoneer/batch/process/webhook', [MassPaymentController::class, 'batchPayoneerWebhook'])->name('batchPayoneerWebhook');
        //settings
        Route::get('setting/configuration', [ConfigurationController::class, 'index'])->name('configuration');
        Route::post('setting/configuration/post', [ConfigurationController::class, 'update'])->name('configuration.update');
        Route::post('setting/update/domain/post', [ConfigurationController::class, 'domainupdate'])->name('configuration.domainupdate');
        //emails
        Route::get('email/send', [EmailController::class, 'send'])->name('email.send');
        Route::get('email/sent/all', [EmailController::class, 'showSentMessages'])->name('email.showSentMessages');
        Route::get('email/sent/get/sent', [EmailController::class, 'getsentMessages'])->name('email.getsentMessages');
        //Route::get('email/settings', [EmailController::class, 'settings'])->name('email.settings');
        Route::post('email/settings/save', [EmailController::class, 'updateEmailSettings'])->name('email.updateEmailSettings');
        Route::post('email/send/all', [EmailController::class, 'sendEmail'])->name('email.sendEmail');
        Route::get('email/systememail', [EmailController::class, 'systememail'])->name('email.systememail');
        //subscribe
        //Route::get('plans/active', [SubscribeController::class, 'subscribe'])->name('plan.active');

        
        //Route::post('subscription/webhook', [PaystackController::class, 'handleWebhook']);

        //plan access

        //number represents the id on feature table
        //smartlink(26)
        Route::middleware([
            'feature-access:26',
        ])->group(function () {
            Route::get('all/smartlinks', [SmartlinkController::class,'allsmartlinks'])->name('all.smartlink');
        });

        

    });


    
    
});

    //no check sub route
    Route::middleware([
        'auth',
    ])->group(function () {
        Route::group([
            'namespace' => 'App\Http\Controllers\Agency',
            'prefix' => 'merchant',
            'middleware' => 'role:merchant',
            'as' => 'merchant.',
        ], function () {
            Route::get('plans/active', [SubscribeController::class, 'subscribe'])->name('plan.active');


            //flutterwave
            Route::post('subscription/create/new', [SubscriptionController::class, 'subscribe'])->name('subscription.create');
            Route::get('subscription/callback', [SubscriptionController::class, 'callback'])->name('subscription.callback');
            //subscription links
            //Route::post('subscription/create', [PaystackController::class, 'createSubscription'])->name('subscription.create');
            //Route::get('subscription/callback', [PaystackController::class, 'subscriptionCallback'])->name('subscription.callback');
        });
        Route::group([
            'namespace' => 'App\Http\Controllers\Affiliate',
            'prefix' => 'affiliate',
            'middleware' => 'role:affiliate',
            'as' => 'affiliate.',
        ], function () {
            Route::get('account/pending', [SubscribeController::class, 'nosubaffiliate'])->name('account.pending');
        });

    });
});


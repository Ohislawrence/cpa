<?php

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
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\SitemapGenerator;
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

foreach (config('tenancy.central_domains') as $domain) {
    Route::domain(env('APP_URL', $domain))->group(function () {

//front pages
Route::get('/', [FrontController::class, 'home'])->name('home');
Route::get('affiliates', [FrontController::class, 'affiliates'])->name('affiliates');
Route::get('advertisers', [FrontController::class, 'advertisers'])->name('advertisers');
Route::get('about-us', [FrontController::class, 'aboutus'])->name('aboutus');
//Route::get('offers', [FrontController::class, 'offers'])->name('offers');
Route::get('blogs', [FrontController::class, 'blogs'])->name('blogs');
Route::get('blog/{cat}/{slug}', [FrontController::class, 'blogsingle'])->name('blogsingle');
Route::get('privacy', [FrontController::class, 'privacy'])->name('privacy');
Route::get('terms-of-service', [FrontController::class, 'tos'])->name('tos');
Route::get('support', [FrontController::class, 'support'])->name('support');
Route::get('contact-us', [FrontController::class, 'contactus'])->name('contactus');
Route::get('error', [FrontController::class, 'error'])->name('error');

//Route::post('login/post/check', [FrontController::class, 'login'])->name('login.check.post');

//affiliate registration
Route::get('sign-up/affiliate', [RegistrationController::class, 'index'])->name('affiliatereg');
//advertiser registration
Route::get('sign-up/advertiser', [RegistrationController::class, 'advertiser'])->name('advertiserreg');
Route::post('sign-up/advertiser/post', [RegistrationController::class, 'postAdvertiser'])->name('advertiserregpost');
//tenant creation
Route::get('start', [CreatetenantController::class,'create'])->name('start');
Route::post('start/create', [CreatetenantController::class,'createTenant'])->name('start.post');
Route::get('congratulations/created', [CreatetenantController::class,'tenantCreated'])->name('tenantCreated');


//redirect to affiate
Route::get('/register', function () {
return redirect(route('start'));
});

//Route::get('login/test', [FrontController::class, 'logintest'])->name('login.test');

//all clicks comes thru here
Route::get('deals/offer', [ClickController::class, 'toOffer'])->name('offer');


//offer webhooks
//Route::webhooks('verify-action-taken', 'webhooktest1');
Route::post('verify-action-taken',[WebhookController::class, 'handle']);

//Route::get('/assign', function () {
//    $user = Auth()->user();
//   $user->assignRole('admin');
//});

//Route::get('/deposite', function () {
//    $user = User::find(5);
 //  $user->depositFloat(3.55);
//});

});
}

Route::middleware([
    'web',
    'auth',
    ])->group(function () {

    foreach (config('tenancy.central_domains') as $domain) {
        Route::domain(env('APP_URL', $domain))->group(function () {

    Route::get('/dashboard', function () {
        
        if (auth()->user()->hasRole('admin')){
            return redirect(route('admin.dashboard'));
        }
        elseif(auth()->user()->hasRole('affiliate')){
            return redirect(route('affiliate.dashboard'));
        }
        elseif(auth()->user()->hasRole('merchant')){
            return redirect(route('merchant.dashboard'));
        }
        else{
            return redirect(route('home'));
        }
    })->name('dashboard');


    //general profile
    Route::get('/profile', function () {
        return view('Profile');
    })->name('profile');

//Admin
    Route::group([
        'namespace' => 'App\Http\Controllers\Admin',
        'prefix' => 'admin',
        'middleware' => 'role:admin',
        'as' => 'admin.',
    ], function () {

        //tenants
        Route::get('tenants/all', [TenantController::class, 'allTenants'])->name('alltenants');
        Route::get('tenant/create/new', [TenantController::class, 'create'])->name('tenant.create');
        Route::post('tenant/create/post', [TenantController::class, 'createTenant'])->name('createTenant.post');
        //users
        Route::get('user', [UserController::class, 'index'])->name('viewusers');
        Route::get('getuser', [UserController::class, 'getusers'])->name('getusers');
        Route::post('user/post', [UserController::class, 'store'])->name('creatuser');
        //Route::get('user/view/{id}', [UserController::class, 'viewuser'])->name('');
        Route::get('user/refferals', [UserController::class, 'refferals'])->name('refferals');
        Route::get('user/edit/{id}', [UserController::class, 'edituser'])->name('edituser');
        Route::put('user/edit/{id}/update', [UserController::class, 'updateuser'])->name('updateuser');
        Route::post('user/edit/{id}/update/merchant', [UserController::class, 'updateuseragency'])->name('updateuseragency');
        //userTabs
        Route::get('user/view/{id}/overview', [UserController::class, 'overview'])->name('viewuser');
        Route::get('user/view/{id}/merchant/overview', [UserController::class, 'overviewagency'])->name('overviewagency');
        Route::get('user/{id}/trafficsource', [UserController::class, 'viewtrafficsource'])->name('viewtrafficsource');
        Route::post('user/update/{id}/traffic', [UserController::class, 'traffic'])->name('traffic');
        Route::get('user/{id}/traffic/source', [UserController::class, 'gettrafficsource'])->name('gettrafficsource');
        //offers
        Route::resource('offers', OfferController::class);
        Route::get('ailink', [OfferController::class, 'ailink'])->name('ailink');
        Route::get('table-data', [OfferController::class, 'viewtable'])->name('viewtable');
        Route::get('offer/{id}/clicks', [ClicksController::class, 'offerclicks'])->name('offerclicks');
        Route::get('offer/{id}/clicks/table', [ClicksController::class, 'offerclickstable'])->name('offerclickstable');
        //payments
        Route::get('transaction', [PaymentsController::class, 'transaction'])->name('transaction');
        Route::get('transaction/table', [PaymentsController::class, 'transactiontable'])->name('transactiontable');
        Route::get('sendpayments', [PaymentsController::class, 'sendpayments'])->name('sendpayments');
        Route::post('makepayment/send', [PaymentsController::class, 'makePayment'])->name('makepayment');
        //email
        Route::get('send/emails', [EmailControler::class, 'index'])->name('emails');

        Route::get('profile', [AdminProfileController::class, 'view'])->name('profile');
        //dashboard
        Route::get('dashboard/main', [AdminDashboardController::class, 'dashboard1'])->name('dashboard');
        Route::get('dashboard/stats', [AdminDashboardController::class, 'dashboard2'])->name('stats');

        //blogs
        Route::get('blogs/getblogs/get', [BlogController::class, 'getblogs'])->name('getblogs');
        Route::get('blogs', [BlogController::class, 'index'])->name('blogs.index');
        Route::get('blog/create', [BlogController::class, 'create'])->name('blogs.create');
        Route::get('blog/{id}/show', [BlogController::class, 'show'])->name('blogs.show');
        Route::post('blog/create/store', [BlogController::class, 'store'])->name('blogs.store');
        Route::put('blog/{id}/update', [BlogController::class, 'update'])->name('blogs.update');
        Route::delete('blog/{id}/delete', [BlogController::class, 'delete'])->name('blogs.delete');
        Route::post('ckeditor/upload',  [BlogController::class, 'upload'])->name('ckeditor.upload');

        //wallet actions
        Route::post('update/user/wallet', [AdminTransactionController::class, 'creditdebit'])->name('creditdebit');
        Route::get('user/{id}/payments/request', [AdminTransactionController::class, 'paymentrequests'])->name('paymentrequests');
        Route::get('user/{id}/transactons', [AdminTransactionController::class, 'transactionuser'])->name('transactionuser');
        Route::get('user/{id}/request', [AdminTransactionController::class, 'getpaymentrequest'])->name('getpaymentrequest');
        Route::get('user/{id}/transactions', [AdminTransactionController::class, 'getusertransaction'])->name('getusertransaction');
        Route::get('user/{id}/transactions/merchant', [AdminTransactionController::class, 'agencytransaction'])->name('agencytransaction');
        //clickstats
        Route::get('user/{id}/clickstats',[ClicksController::class, 'userclickstats'])->name('userclickstats');
        Route::get('user/{id}/clickstats/get',[ClicksController::class, 'getuserclickstats'])->name('getuserclickstats');
        //offer merchant
        Route::get('user/{id}/merchant/offers',[OfferController::class, 'agencyoffer'])->name('agencyoffer');
        Route::get('user/{id}/merchant/get/offers',[OfferController::class, 'getagencyoffer'])->name('getagencyoffer');

        //settings
        Route::get('settings', [SettingController::class, 'index'])->name('settings');

        //sitemap
        Route::get('/sitemap/generate', function () {
            SitemapGenerator::create(url('/'))->writeToFile(public_path('sitemap.xml'));
            //redirect()->back()->with('message', 'Sitemap updated');
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


        Route::get('logout/here', [FrontController::class, 'logout'])->name('logout');

    });




    });
    }

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


    

    
});

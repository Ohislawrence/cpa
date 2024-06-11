<?php

use App\Http\Controllers\Admin\ClicksController;
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
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ClickController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\WebhookController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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

//affiliate registration
Route::get('sign-up/affiliate', [RegistrationController::class, 'index'])->name('affiliatereg');

//all clicks comes thru here
Route::get('deals/offer', [ClickController::class, 'toOffer'])->name('offer');


//offer webhooks
//Route::webhooks('verify-action-taken', 'webhooktest1');
Route::webhooks('verify-action-taken',[WebhookController::class, 'handle']);

//Route::get('/assign', function () {
//    $user = Auth()->user();
//   $user->assignRole('admin');
//});

Route::get('/deposite', function () {
    $user = User::find(5);
   $user->depositFloat(3.55);
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        if (auth()->user()->hasRole('admin')){
            return redirect(route('admin.dashboard'));
        }
        elseif(auth()->user()->hasRole('affiliate')){
            return redirect(route('affiliate.dashboard'));
        }
        elseif(auth()->user()->hasRole('agency')){
            return redirect(route('agency.dashboard'));
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

        //users
        Route::get('user', [UserController::class, 'index'])->name('viewusers');
        Route::get('getuser', [UserController::class, 'getusers'])->name('getusers');
        Route::post('user/post', [UserController::class, 'store'])->name('creatuser');
        //Route::get('user/view/{id}', [UserController::class, 'viewuser'])->name('');
        Route::get('user/refferals', [UserController::class, 'refferals'])->name('refferals');
        Route::get('user/edit/{id}', [UserController::class, 'edituser'])->name('edituser');
        Route::put('user/edit/{id}/update', [UserController::class, 'updateuser'])->name('updateuser');
        Route::post('user/edit/{id}/update/agency', [UserController::class, 'updateuseragency'])->name('updateuseragency');
        //userTabs
        Route::get('user/view/{id}/overview', [UserController::class, 'overview'])->name('viewuser');
        Route::get('user/view/{id}/agency/overview', [UserController::class, 'overviewagency'])->name('overviewagency');
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
        Route::get('user/{id}/transactions/agency', [AdminTransactionController::class, 'agencytransaction'])->name('agencytransaction');
        //clickstats
        Route::get('user/{id}/clickstats',[ClicksController::class, 'userclickstats'])->name('userclickstats');
        Route::get('user/{id}/clickstats/get',[ClicksController::class, 'getuserclickstats'])->name('getuserclickstats');
        //offer agency
        Route::get('user/{id}/agency/offers',[OfferController::class, 'agencyoffer'])->name('agencyoffer');
        Route::get('user/{id}/agency/get/offers',[OfferController::class, 'getagencyoffer'])->name('getagencyoffer');

        //settings
        Route::get('settings', [SettingController::class, 'index'])->name('settings');
    });

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

//Agency
    Route::group([
        'namespace' => 'App\Http\Controllers\Agency',
        'prefix' => 'agency',
        'middleware' => 'role:agency',
        'as' => 'agency.',
    ], function () {
        Route::get('profile', [AgencyProfileController::class, 'index'])->name('profile');
        Route::get('dashboard', [AgencyDashboardController::class, 'index'])->name('dashboard');
        Route::get('offers', [AgencyOfferController::class, 'index'])->name('offers');
        Route::get('reports', [ReportController::class, 'index'])->name('reports');
        Route::get('transaction', [TransactionController::class, 'index'])->name('transaction');

    });
});

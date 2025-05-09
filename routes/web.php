<?php

use App\Http\Controllers\Admin\ClicksController;
use App\Http\Controllers\Admin\CreatetenantController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\EmailControler;
use App\Http\Controllers\Admin\InfoController;
use App\Http\Controllers\Admin\IntegrationController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\PaymentsController;
use App\Http\Controllers\Admin\PaystackController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\TransactionController as AdminTransactionController;
use App\Http\Controllers\Admin\UserController;
//use App\Http\Controllers\Affiliate\DashboardController;
//use App\Http\Controllers\Affiliate\OfferController as AffiliateOfferController;
//use App\Http\Controllers\Affiliate\PaymentController;
//use App\Http\Controllers\Affiliate\ProfileController;
//use App\Http\Controllers\Affiliate\PromotionalController;
//use App\Http\Controllers\Affiliate\ReferralController;
//use App\Http\Controllers\Affiliate\RegistrationController;
//use App\Http\Controllers\Agency\DashboardController as AgencyDashboardController;
//use App\Http\Controllers\Agency\OfferController as AgencyOfferController;
//use App\Http\Controllers\Agency\ProfileController as AgencyProfileController;
//use App\Http\Controllers\Agency\ReportController;
//use App\Http\Controllers\Agency\TransactionController;
//use App\Http\Controllers\Agency\AffiliateController;
//use App\Http\Controllers\Agency\ConfigurationController;
//use App\Http\Controllers\Agency\EmailController;
//use App\Http\Controllers\Agency\MassPaymentController;
//use App\Http\Controllers\Agency\PayoutController as AgencyPayoutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ClickController;
use App\Http\Controllers\CookieConsentController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\WebhookController;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\SitemapGenerator;
use function Laravel\Prompts\alert;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

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
        Route::middleware([
            'web',
            ])->group(function () {
            //front pages

            Route::get('/login', function () {
                return redirect(route('login.test'));
                })->name('login');

            Route::get('/', [FrontController::class, 'home'])->name('home');
            Route::get('affiliates', [FrontController::class, 'affiliates'])->name('affiliates');
            Route::get('advertisers', [FrontController::class, 'advertisers'])->name('advertisers');
            Route::get('about-us', [FrontController::class, 'aboutus'])->name('aboutus');
            //Route::get('offers', [FrontController::class, 'offers'])->name('offers');
            Route::get('blogs', [FrontController::class, 'blogs'])->name('blogs');
            Route::get('blog/{cat}/{slug}', [FrontController::class, 'blogsingle'])->name('blogsingle');
            Route::get('privacy-policy', [FrontController::class, 'privacy'])->name('privacy');
            Route::get('refund-policy', [FrontController::class, 'refund'])->name('refund');
            Route::get('terms-of-service', [FrontController::class, 'tos'])->name('tos');
            //Route::get('support', [FrontController::class, 'support'])->name('support');
            Route::get('contact-us', [FrontController::class, 'contactus'])->name('contactus');
            Route::get('error', [FrontController::class, 'error'])->name('error');
            Route::get('pricing', [FrontController::class, 'pricing'])->name('pricing');
            //support
            Route::get('support', [FrontController::class, 'Support'])->name('support');
            Route::get('support/{support}', [FrontController::class, 'showSupport'])->name('app.support');
            Route::get('support/{support}/{slug}', [FrontController::class, 'showContent'])->name('support.content');

            

            //Route::post('login/post/check', [FrontController::class, 'login'])->name('login.check.post');

            //affiliate registration
           //Route::get('sign-up/affiliate', [RegistrationController::class, 'index'])->name('affiliatereg');
            //advertiser registration
            //Route::get('sign-up/advertiser', [RegistrationController::class, 'advertiser'])->name('advertiserreg');
            //Route::post('sign-up/advertiser/post', [RegistrationController::class, 'postAdvertiser'])->name('advertiserregpost');
            
            //paddle subscribe
            Route::get('/subscribe', [SubscriptionController::class, 'checkout'])->name('subscribe');

            //Route::post('/paddle/webhook', '\Laravel\Cashier\Http\Controllers\WebhookController@handleWebhook');

            //redirect to affiate
            Route::get('/register', function () {
                return redirect(route('start'));
                });
            //tenant creation
            Route::get('start', [CreatetenantController::class,'create'])->name('start');
            Route::post('start/create', [CreatetenantController::class,'createTenant'])->name('start.post');
            Route::get('congratulations/created/{sub?}', [CreatetenantController::class,'tenantCreated'])->name('tenantCreated');

            Route::get('get/features', function () {
                $sub= \App\Models\Subscription::where('tenant_id','timeday')->first();
                $planfeatures = \DB::table('planfeatures')->where('plan_id',$sub->plan->id)->pluck('feature_id')->unique();
                $planfeatures =$planfeatures->toArray();
                if (!in_array(333, $planfeatures)) {
                    abort(403, 'This feature is not available on your current plan.');
                }else{
                    return 'done';
                }
                });


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

            
            
            //auth
            //login
            Route::get('app/login', [FrontController::class, 'logintest'])->name('login.test');
            Route::post('login/post/check', [FrontController::class, 'login'])->name('login.check.post');
            //password reset
            Route::get('password/reset', [FrontController::class, 'passwordreset'])->name('password.reset');
            Route::post('post/password/reset', [FrontController::class, 'passwordresetpost'])->name('password.reset.post');

            Route::post('get/sub/details/flutterwave', [SubscriptionController::class, 'webhook']);

            //sitemap
            Route::get('/sitemap.xml', function () {
                $sitemap = Sitemap::create()
                    ->add(Url::create('/')
                        ->setLastModificationDate(now())
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                        ->setPriority(1.0))
                    ->add(Url::create('/start')
                        ->setLastModificationDate(now())
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                        ->setPriority(0.8))
                    ->add(Url::create('/pricing')
                        ->setLastModificationDate(now())
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                        ->setPriority(0.8))
                    ->add(Url::create('/blogs')
                        ->setLastModificationDate(now())
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                        ->setPriority(0.8))
                    ->add(Url::create('/#tracklia_features')
                        ->setLastModificationDate(now())
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                        ->setPriority(0.8))
                    ->add(Url::create('/contact-us')
                        ->setLastModificationDate(now())
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                        ->setPriority(0.6))
                    ->add(Url::create('/support')
                        ->setLastModificationDate(now())
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                        ->setPriority(0.6))
                    ->add(Url::create('/support/integrations')
                        ->setLastModificationDate(now())
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                        ->setPriority(0.6))
                    ->add(Url::create('/refund-policy')
                        ->setLastModificationDate(now())
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                        ->setPriority(0.6))
                    ->add(Url::create('/privacy-policy')
                        ->setLastModificationDate(now())
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                        ->setPriority(0.6))
                    ->add(Url::create('/refund-policy')
                        ->setLastModificationDate(now())
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                        ->setPriority(0.6))
                    ->add(Url::create('/about-us')
                        ->setLastModificationDate(now())
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                        ->setPriority(0.6));
            
                // Add all blog posts dynamically
                $posts = Blog::latest()->get();
            
                foreach ($posts as $post) {
                    $sitemap->add(
                        Url::create("/blog/{$post->cat->slug}/{$post->slug}")
                            ->setLastModificationDate($post->updated_at)
                            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                            ->setPriority(0.7)
                    );
                }
                return $sitemap->toResponse(request());
            });

        });
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
    //subscription links
   // Route::post('/subscription/create', [PaystackController::class, 'createSubscription'])->name('subscription.create');
   // Route::get('/subscription/callback', [PaystackController::class, 'subscriptionCallback'])->name('subscription.callback');
    //Route::post('/subscription/webhook', [PaystackController::class, 'handleWebhook'])->middleware('allowIPforWebhook');

    


    Route::group([
        'namespace' => 'App\Http\Controllers\Agency',
        'prefix' => 'merchant',
        'middleware' => 'role:merchant',
        'as' => 'merchant.',
        
    ], function () {
       // Route::get('profile' , [ProfileController::class, 'index'])->name('myprofile');
       
    });


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
        Route::post('tenant/newsubdomain/api', [TenantController::class, 'subdomainapi'])->name('subdomainapi');
        //users
        Route::get('users', [UserController::class, 'index'])->name('viewusers');
        Route::delete('user/delete/{id}', [UserController::class, 'deleteUser'])->name('deleteUser');
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

        //info
        Route::resource('info', InfoController::class);

        //blogs
        Route::get('blogs/getblogs/get', [BlogController::class, 'getblogs'])->name('getblogs');
        Route::get('blogs', [BlogController::class, 'index'])->name('blogs.index');
        Route::get('blog/create', [BlogController::class, 'create'])->name('blogs.create');
        Route::get('blog/{id}/show', [BlogController::class, 'show'])->name('blogs.show');
        Route::post('blog/create/store', [BlogController::class, 'store'])->name('blogs.store');
        Route::post('blog/{id}/update', [BlogController::class, 'update'])->name('blogs.update');
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

        //integration
        Route::get('app/supports/show/all', [IntegrationController::class, 'showAll'])->name('show.supports');
        Route::get('app/integration/create', [IntegrationController::class, 'create'])->name('create.integrations');
        Route::get('app/integration/edit/{id}', [IntegrationController::class, 'edit'])->name('edit.integrations');
        Route::post('app/integration/create/post', [IntegrationController::class, 'postdb'])->name('postdb.integrations');
        Route::post('app/integration/update/{id}/put', [IntegrationController::class, 'update'])->name('update.integrations');
        Route::get('get/app/integration/data', [IntegrationController::class, 'getIntegration'])->name('get.getIntegration');
        Route::delete('app/integration/detete/{id}', [IntegrationController::class, 'destroy'])->name('destroy.integration');
        Route::post('app/integration/desc/upload', [IntegrationController::class, 'upload'])->name('ckedit.upload.integration');

        //sitemap
        Route::get('/sitemap/generate', function () {
            SitemapGenerator::create(url('/'))->writeToFile(public_path('sitemap.xml'));
            //redirect()->back()->with('message', 'Sitemap updated');
            });
    });


    });
    }
    
});

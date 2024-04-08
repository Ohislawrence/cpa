<?php

use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Affiliate\OfferController as AffiliateOfferController;
use App\Http\Controllers\Affiliate\ProfileController;
use App\Http\Controllers\Agency\ProfileController as AgencyProfileController;
use App\Http\Controllers\ClickController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('deals/offer', [ClickController::class, 'toOffer'])->name('offer');

//Route::get('/assign', function () {
//    $user = Auth()->user();
//   $user->assignRole('admin');
//});

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
        Route::get('/dashboard', function () {
            return view('Dashboard');
        })->name('dashboard');
        //users
        Route::get('user', [UserController::class, 'index'])->name('viewusers');
        Route::get('getuser', [UserController::class, 'getusers'])->name('getusers');
        Route::post('user/post', [UserController::class, 'store'])->name('creatuser');
        Route::get('viewuser/{id}', [UserController::class, 'viewuser'])->name('viewuser');
        Route::resource('offers', OfferController::class);
        Route::get('profile', [AdminProfileController::class, 'view'])->name('profile');
    });

//Affiliate
    Route::group([
        'namespace' => 'App\Http\Controllers\Affiliate',
        'prefix' => 'affiliate',
        'middleware' => 'role:affiliate',
        'as' => 'affiliate.',
    ], function () {
        Route::get('/dashboard', function () {
            return view('Dashboard');
        })->name('dashboard');
        Route::get('profile' , [ProfileController::class, 'index'])->name('myprofile');
        Route::get('offers', [AffiliateOfferController::class, 'index'])->name('offer');
        Route::get('offers/view/all', [AffiliateOfferController::class, 'viewoffers'])->name('viewoffers');
        Route::get('offers/{id}/view', [AffiliateOfferController::class, 'thisoffer'])->name('thisoffer');

    });

//Agency
    Route::group([
        'namespace' => 'App\Http\Controllers\Agency',
        'prefix' => 'agency',
        'middleware' => 'role:agency',
        'as' => 'agency.',
    ], function () {
        Route::get('/dashboard', function () {
            return view('Dashboard');
        })->name('dashboard');
        Route::get('profile', [AgencyProfileController::class, 'index'])->name('profile');

    });
});

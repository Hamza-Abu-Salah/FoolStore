<?php

use App\Http\Controllers\AdminControllers\ComplaintsController;
use App\Http\Controllers\AdminControllers\CustomerReviewController;
use App\Http\Controllers\AdminControllers\OrdersController;
use App\Http\Controllers\AdminControllers\ProductsController;
use App\Http\Controllers\AdminControllers\RatesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\AdminControllers\BanksController;
use App\Http\Controllers\AdminControllers\CallUsController;
use App\Http\Controllers\AdminControllers\CardsController;
use App\Http\Controllers\AdminControllers\IndexController;
use App\Http\Controllers\AdminControllers\UsersController;
use App\Http\Controllers\AdminControllers\AdminsController;
use App\Http\Controllers\AdminControllers\StoresController;
use App\Http\Controllers\AdminControllers\CouponsController;
use App\Http\Controllers\AdminControllers\LeadersController;
use App\Http\Controllers\AdminControllers\SettingController;
use App\Http\Controllers\AdminControllers\SlidersController;
use App\Http\Controllers\AdminControllers\CategoriesController;
use App\Http\Controllers\AdminControllers\NationalitiesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => 'guest'], function () {
    Route::view('admin/login', 'auth.admin_login')->name('admin_login');
    Route::post('admin/login', [AuthController::class, 'admin_login']);
    Route::view('login', 'auth.login')->name('store_login');
    Route::post('login', [AuthController::class, 'store_login'])->name('login');
});

Route::group(['middleware' => ['auth:admin', 'url_detect']], function () {
    Route::get('panel', [IndexController::class, 'index']);
    Route::get('admin/logout', [AuthController::class, 'admin_logout']);

    Route::group(['prefix' => 'admins'], function () {
        Route::get('', [AdminsController::class, 'index']);
        Route::get('create', [AdminsController::class, 'create']);
        Route::post('store', [AdminsController::class, 'store']);
        Route::get('edit/{id}', [AdminsController::class, 'edit']);
        Route::post('update/{id}', [AdminsController::class, 'update']);
        Route::get('delete/{id}', [AdminsController::class, 'delete']);
        Route::post('groupDelete', [AdminsController::class, 'groupDelete']);
    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('', [UsersController::class, 'index']);
        Route::get('details/{id}', [UsersController::class, 'details']);
        Route::get('delete/{id}', [UsersController::class, 'delete']);
        Route::post('groupDelete', [UsersController::class, 'groupDelete']);
    });

    Route::group(['prefix' => 'products'], function () {
        Route::get('', [ProductsController::class, 'index']);
        Route::get('accepted', [ProductsController::class, 'accepted']);
        Route::get('waiting', [ProductsController::class, 'waiting']);
        Route::get('toggle_accept/{id}', [ProductsController::class, 'toggle_accept']);
        Route::get('delete/{id}', [ProductsController::class, 'toggle_accept']);
        Route::post('groupDelete', [ProductsController::class, 'groupDelete']);
    });

    Route::group(['prefix' => 'leaders'], function () {
        Route::get('', [LeadersController::class, 'index']);
        Route::get('registers', [LeadersController::class, 'registers']);
        Route::get('identity-docs', [LeadersController::class, 'identity_docs']);
        Route::get('create', [LeadersController::class, 'create']);
        Route::post('store', [LeadersController::class, 'store']);
        Route::get('edit/{id}', [LeadersController::class, 'edit']);
        Route::post('update/{id}', [LeadersController::class, 'update']);
        Route::get('delete/{id}', [LeadersController::class, 'delete']);
        Route::get('toggle_active/{id}/{status}', [LeadersController::class, 'toggle_active']);
        Route::get('toggle_priority/{id}', [LeadersController::class, 'toggle_priority']);
        Route::get('accept/{id}/{status}', [LeadersController::class, 'accept']);
        Route::post('groupDelete', [LeadersController::class, 'groupDelete']);
    });

    Route::group(['prefix' => 'sliders'], function () {
        Route::get('', [SlidersController::class, 'index']);
        Route::get('create', [SlidersController::class, 'create']);
        Route::post('store', [SlidersController::class, 'store']);
        Route::get('edit/{id}', [SlidersController::class, 'edit']);
        Route::post('update/{id}', [SlidersController::class, 'update']);
        Route::get('delete/{id}', [SlidersController::class, 'delete']);
        Route::post('groupDelete', [SlidersController::class, 'groupDelete']);
    });

    Route::group(['prefix' => 'categories'], function () {
        Route::get('', [CategoriesController::class, 'index']);
        Route::get('create', [CategoriesController::class, 'create']);
        Route::post('store', [CategoriesController::class, 'store']);
        Route::get('edit/{id}', [CategoriesController::class, 'edit']);
        Route::post('update/{id}', [CategoriesController::class, 'update']);
        Route::get('delete/{id}', [CategoriesController::class, 'delete']);
        Route::post('groupDelete', [CategoriesController::class, 'groupDelete']);
    });

    Route::group(['prefix' => 'cards'], function () {
        Route::get('', [CardsController::class, 'index']);
        Route::get('create', [CardsController::class, 'create']);
        Route::post('store', [CardsController::class, 'store']);
        Route::get('edit/{id}', [CardsController::class, 'edit']);
        Route::post('update/{id}', [CardsController::class, 'update']);
        Route::get('delete/{id}', [CardsController::class, 'delete']);
        Route::post('groupDelete', [CardsController::class, 'groupDelete']);
    });

    Route::group(['prefix' => 'stores'], function () {
        Route::get('', [StoresController::class, 'index']);
        Route::get('registers', [StoresController::class, 'registers']);
        Route::get('create', [StoresController::class, 'create']);
        Route::post('store', [StoresController::class, 'store']);
        Route::get('edit/{id}', [StoresController::class, 'edit']);
        Route::post('update/{id}', [StoresController::class, 'update']);
        Route::get('delete/{id}', [StoresController::class, 'delete']);
        Route::get('toggle_status/{id}', [StoresController::class, 'toggle_status']);
        Route::post('groupDelete', [StoresController::class, 'groupDelete']);
    });

    Route::group(['prefix' => 'coupons'], function () {
        Route::get('', [CouponsController::class, 'index']);
        Route::post('store', [CouponsController::class, 'store']);
        Route::post('update/{id}', [CouponsController::class, 'update']);
        Route::get('delete/{id}', [CouponsController::class, 'delete']);
        Route::post('groupDelete', [CouponsController::class, 'groupDelete']);
    });

    Route::group(['prefix' => 'banks'], function () {
        Route::get('', [BanksController::class, 'index']);
        Route::post('store', [BanksController::class, 'store']);
        Route::post('update/{id}', [BanksController::class, 'update']);
        Route::get('delete/{id}', [BanksController::class, 'delete']);
        Route::post('groupDelete', [BanksController::class, 'groupDelete']);
    });

    Route::group(['prefix' => 'nationalities'], function () {
        Route::get('', [NationalitiesController::class, 'index']);
        Route::post('store', [NationalitiesController::class, 'store']);
        Route::post('update/{id}', [NationalitiesController::class, 'update']);
        Route::get('delete/{id}', [NationalitiesController::class, 'delete']);
        Route::post('groupDelete', [NationalitiesController::class, 'groupDelete']);
    });

    Route::group(['prefix' => 'call-us'], function () {
        Route::get('', [CallUsController::class, 'index']);
        Route::get('delete/{id}', [CallUsController::class, 'delete']);
        Route::get('reply/{id}', [CallUsController::class, 'reply']);
        Route::post('groupDelete', [CallUsController::class, 'groupDelete']);
    });

    Route::group(['prefix' => 'settings'], function () {
        Route::get('', [SettingController::class, 'index']);
        Route::post('set', [SettingController::class, 'settings']);
    });

    Route::group(['prefix' => 'orders'], function () {
        Route::get('', [OrdersController::class, 'index']);
        Route::post('groupDelete', [OrdersController::class, 'groupDelete']);
    });

    Route::group(['prefix' => 'customers/reviews'], function () {
        Route::get('', [CustomerReviewController::class, 'index']);
        Route::get('create', [CustomerReviewController::class, 'create']);
        Route::post('store', [CustomerReviewController::class, 'store']);
        Route::get('edit/{id}', [CustomerReviewController::class, 'edit']);
        Route::post('update/{id}', [CustomerReviewController::class, 'update']);
        Route::get('delete/{id}', [CustomerReviewController::class, 'delete']);
        Route::get('toggle_status/{id}', [CustomerReviewController::class, 'toggle_status']);
        Route::post('groupDelete', [CustomerReviewController::class, 'groupDelete']);
    });

    Route::group(['prefix' => 'rates'], function () {
        Route::get('stores', [RatesController::class, 'stores']);
        Route::get('captains', [RatesController::class, 'captains']);
        Route::get('users', [RatesController::class, 'users']);
    });

    Route::group(['prefix' => 'complaints'], function () {
        Route::get('stores', [ComplaintsController::class, 'stores']);
        Route::get('captains', [ComplaintsController::class, 'captains']);
        Route::get('users', [ComplaintsController::class, 'users']);
        Route::post('groupDelete', [ComplaintsController::class, 'groupDelete']);
    });
});

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => '\App\Http\Controllers\LanguageController@switchLang']);

Route::get('try',[SiteController::class,'try'])->name('try');
Route::get('',[SiteController::class,'home'])->name('homepage');
Route::get('work_in_twenty',[SiteController::class,'work_in_twenty'])->name('work_in_twenty');
Route::get('contact_us',[SiteController::class,'contact_us'])->name('contact_us');
Route::post('contactus',[SiteController::class,'contactus'])->name('contactus');
Route::get('register_store',[SiteController::class,'register_store'])->name('register_store');
Route::post('registerstore',[SiteController::class,'registerstore'])->name('registerstore');
Route::get('documentation_login',[SiteController::class,'documentation_login'])->name('documentation_login');
Route::post('documentation',[SiteController::class,'documentation'])->name('documentation');
Route::get('about',[SiteController::class,'about'])->name('about');
Route::get('role',[SiteController::class,'role'])->name('role');
Route::get('conditions',[SiteController::class,'conditions'])->name('conditions');

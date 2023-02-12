<?php

namespace App\Http\Controllers\ApiControllers;

use App\Models\Slider;
use Illuminate\Support\Facades\Route;

Route::middleware('auth.sanctum')->group(function () {
    Route::get('me', [AuthController::class, 'me']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('all-devices-logout', [AuthController::class, 'all_devices_logout']);
    Route::post('rate-user/{id}', [IndexController::class, 'rate_user']);
    Route::post('auth-user-rates', [IndexController::class, 'auth_user_rates']);
    Route::post('user-rates/{id}', [IndexController::class, 'user_rates']);
    Route::post('rate/{id}', [IndexController::class, 'single_rate']);
    Route::post('update-rate/{id}', [IndexController::class, 'update_rate']);
    Route::post('update-profile', [IndexController::class, 'update_profile']);
    Route::group(['prefix' => 'orders'], function () {
        Route::post('send', [OrdersController::class, 'send']);
        Route::get('get', [OrdersController::class, 'get']);
        Route::get('single/{id}', [OrdersController::class, 'single']);

        Route::post('captain-request-accept/{id}', [OrdersController::class, 'captain_request_accept']);
        Route::post('captain-request-refuse/{id}', [OrdersController::class, 'captain_request_refuse']);
        Route::get('get_waiting_captain_request_for_user', [OrdersController::class, 'get_waiting_captain_request_for_user']);
        Route::get('get_all_captain_request_for_user', [OrdersController::class, 'get_all_captain_request_for_user']);
    });
    Route::group(['prefix' => 'complaints'], function () {
        Route::get('', [ComplaintsController::class, 'all']);
        Route::post('store/{id}', [ComplaintsController::class, 'store']);
        Route::post('captain/{id}', [ComplaintsController::class, 'captain']);
        Route::post('user/{id}', [ComplaintsController::class, 'user']);
        Route::get('stores', [ComplaintsController::class, 'stores']);
        Route::get('captains', [ComplaintsController::class, 'captains']);
        Route::get('users', [ComplaintsController::class, 'users']);
        Route::get('{id}', [ComplaintsController::class, 'single']);
    });
    Route::group(['prefix' => 'rates'], function () {
        Route::get('', [RatesController::class, 'all']);
        Route::post('store/{id}', [RatesController::class, 'store']);
        Route::post('captain/{id}', [RatesController::class, 'captain']);
        Route::post('user/{id}', [RatesController::class, 'user']);
        Route::get('stores', [RatesController::class, 'stores']);
        Route::get('captains', [RatesController::class, 'captains']);
        Route::get('users', [RatesController::class, 'users']);
        Route::get('{id}', [RatesController::class, 'single']);
    });
    Route::group(['prefix' => 'notifications'], function () {
        Route::get('', [NotificationsController::class, 'all']);
        Route::get('{id}', [NotificationsController::class, 'single']);
        Route::post('store', [NotificationsController::class, 'send']);
        Route::post('read/{id}', [NotificationsController::class, 'read']);
    });
    Route::get('get-near-captains', [IndexController::class, 'get_near_captains']);
    Route::get('user-orders', [IndexController::class, 'user_orders']);
    Route::get('captain-orders', [IndexController::class, 'captain_orders']);
});

Route::middleware('auth.guest')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
});

Route::post('update-captain-long-lat/{id}', [IndexController::class, 'update_captain_long_lat']);
Route::post('is-user-found', [AuthController::class, 'is_user_found']);

Route::get('sliders', [IndexController::class, 'sliders']);
Route::get('sliders/{id}', [IndexController::class, 'slider_single']);

Route::get('settings', [IndexController::class, 'settings']);

Route::get('categories', [IndexController::class, 'categories']);
Route::get('products-categories/{id}', [IndexController::class, 'products_categories']);
Route::get('products-category-single/{id}', [IndexController::class, 'products_category_single']);

Route::get('categories/{id}', [IndexController::class, 'category_single']);

Route::get('best-seller-stores', [IndexController::class, 'best_seller_stores']);
Route::get('stores', [IndexController::class, 'stores']);
Route::get('stores/search', [IndexController::class, 'search_store']);

Route::get('stores/{id}', [IndexController::class, 'store_single']);

Route::get('banks', [IndexController::class, 'banks']);
Route::get('check_coupon/{code}', [IndexController::class, 'coupon']);
Route::get('nationalities', [IndexController::class, 'nationalities']);
Route::post('call-us', [IndexController::class, 'call_us']);
Route::get('call-us-messages', [IndexController::class, 'call_us_messages']);
Route::get('call-us-message/{id}', [IndexController::class, 'call_us_messages_single']);
Route::get('edit-call-us-message/{id}', [IndexController::class, 'call_us_messages_single_edit']);
Route::post('cards', [IndexController::class, 'cards']);
Route::post('artisan', [IndexController::class, 'artisan']);

<?php

use App\Http\Controllers\StoreControllers\OrdersController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StoreControllers\CategoriesController;
use App\Http\Controllers\StoreControllers\ProductsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreControllers\IndexController;

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

Route::group(['middleware' => ['auth:store', 'store_status'], 'prefix' => 'store'], function () {
    Route::get('', [IndexController::class, 'index']);
    Route::get('logout', [AuthController::class, 'store_logout']);

    Route::group(['prefix' => 'products/categories'], function () {
        Route::get('', [CategoriesController::class, 'index']);
        Route::get('create', [CategoriesController::class, 'create']);
        Route::post('store', [CategoriesController::class, 'store']);
        Route::get('edit/{id}', [CategoriesController::class, 'edit']);
        Route::post('update/{id}', [CategoriesController::class, 'update']);
        Route::get('delete/{id}', [CategoriesController::class, 'delete']);
        Route::post('groupDelete', [CategoriesController::class, 'groupDelete']);
    });

    Route::group(['prefix' => 'products'], function () {
        Route::get('', [ProductsController::class, 'index']);
        Route::get('create', [ProductsController::class, 'create']);
        Route::post('store', [ProductsController::class, 'store']);
        Route::get('edit/{id}', [ProductsController::class, 'edit']);
        Route::post('update/{id}', [ProductsController::class, 'update']);
        Route::get('delete/{id}', [ProductsController::class, 'delete']);
        Route::post('groupDelete', [ProductsController::class, 'groupDelete']);
    });

    Route::group(['prefix' => 'orders'], function () {
        Route::get('', [OrdersController::class, 'index']);
    });
});

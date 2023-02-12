<?php

namespace App\Http\Controllers\ApiControllers\CaptainControllers;
use App\Http\Controllers\ApiControllers\OrdersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('captain-info', [CompleteRegisterController::class, 'captain_info']);
Route::get('get-captain-info', [CompleteRegisterController::class, 'get_captain_info']);
Route::post('vehicle-info', [CompleteRegisterController::class, 'vehicle_info']);
Route::get('get-vehicle-info', [CompleteRegisterController::class, 'get_vehicle_info']);
Route::post('required-documents', [CompleteRegisterController::class, 'required_documents']);
Route::get('get-required-document', [CompleteRegisterController::class, 'get_required_documents']);


Route::group(['prefix' => 'orders'], function () {
    Route::post('captain-request/{order_id}', [OrdersController::class, 'captain_request']);
    Route::get('get_waiting_captain_request', [OrdersController::class, 'get_waiting_captain_request_for_captain']);
    Route::get('get_all_captain_request', [OrdersController::class, 'get_all_captain_request_for_captain']);
});

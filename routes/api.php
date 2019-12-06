<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('dashboard/summary/data',"AdminController@dashboardtitleApiSummary");
Route::get('activeyear/{acytiveyear}/data',"ActiveyearController@show");
Route::get('handleresponsePment/{pesapal_transaction_tracking_id}/{pesapal_merchant_reference}/clear',"ParticipantController@handlePaymentResponse");
Route::post('participant/payment/make','ParticipantController@makeParticipationFeesPending')->name('ekns.makePendingPayment');

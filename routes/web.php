<?php

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


Route::get('/dashboard','AdminController@dashboard')->name('dashboard');
Route::get('/','EkisakaateController@load')->name('load.index');
Route::resource('participants','ParticipantController');
Route::resource('participanthouses','ParticipanthouseController')->middleware('auth');
Route::resource('activeyears','ActiveyearController')->middleware('auth');
Route::resource('ekns','EkisakaateController')->middleware('auth');
Route::get('ekn/{ekn}/confirmpayments/latest','ParticipantController@getListPendingConfirmation')->name('ekns.getConfirm')->middleware('auth');
Route::post('ekn/confirmpayments','ParticipantController@confirmParticipationFeesPending')->name('ekns.confirmpayment')->middleware('auth');
Route::get('identification/{participant}/tag','MakeIDController@participantID')->name('tags.participant')->middleware('auth');
Route::get('print_to_pdf/{participant}/','ParticipantController@generatePdf')->name('pdf.participant');
Route::get('participant/payment/redirect','ParticipantController@paymentRedirect')->name('payment.redirect');
Route::get('participant/{pesapalTrackingId}/payment/{pesapal_merchant_reference}/','ParticipantController@payment_message')->name('ekn.payment_msg');
Route::patch('participant/conf/{participant}/payment','ParticipantController@confirmPayment')->name('payment.confirm')->middleware('auth');
Route::get('ekn/{ekn}/participants/assign','ParticipanthouseController@assignToParticipants')->name('participants.selecthouses')->middleware('auth');
Route::post('ekn/participants/assign','ParticipanthouseController@assignHouses')->name('participants.assignhouses')->middleware('auth');
Auth::routes();
Route::get('/home', 'EkisakaateController@load')->name('home');

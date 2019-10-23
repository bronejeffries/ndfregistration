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


Route::get('/','EkisakaateController@load')->name('load.index');
Route::resource('participants','ParticipantController');
Route::resource('activeyears','ActiveyearController')->middleware('auth');
Route::resource('ekns','EkisakaateController')->middleware('auth');
Route::post('identification/{participant}/tag','MakeIDController@participantID')->name('tags.participant')->middleware('auth');
Route::get('print_to_pdf/{participant}/','ParticipantController@generatePdf')->name('pdf.participant');
Route::get('participant/payment/redirect','ParticipantController@paymentRedirect')->name('payment.redirect');
Route::get('participant/{participant}/payment/message/{type}/{message}/','ParticipantController@payment_message')->name('ekn.payment_msg');


Auth::routes();

Route::get('/home', 'EkisakaateController@load')->name('home');

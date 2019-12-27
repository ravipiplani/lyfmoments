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

Route::get('/', 'HomeController@index')->name('index');
Route::get('/moment', 'HomeController@moment')->name('moment');

Route::post('/moments', 'MomentController@store')->name('moments.store');
Route::post('/moments/{moment}', 'MomentController@update')->name('moments.update');

Route::get('/payment/initiate', 'PaymentController@initiate')->name('payment.initiate');
Route::post('/out/payment/response' , 'PaymentController@response')->name('payment.response');

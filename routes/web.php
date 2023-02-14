<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// For User
Route::resource('/', 'CheckoutController');

Route::resource('/checkout', 'CheckoutController');

Route::post('/checkout/new', 'CheckoutController@add');

Route::post('/checkout/pay', 'CheckoutController@add_for_fix');

Route::get('/', 'CheckoutController@index');

Route::get('/checkout', 'CheckoutController@index_fix');

Route::resource('/mm', 'CheckoutController');

Route::resource('/checkout-mm', 'CheckoutController');

Route::get('/mm', 'CheckoutController@index_mm');

Route::get('/checkout-mm', 'CheckoutController@index_fix_mm');

Route::resource('/donation', 'DonationController');

Route::get('/getData/{id}','DonationController@getData');

Route::get('/pin-getData/{id}','DonationController@pin_getData');

Route::post('/donation/new', 'DonationController@add');

Route::get('/donation/qr/{qr}/{message}/{donationID}', 'DonationController@qr');

Route::get('/donation/pin/{message}/{donationID}', 'DonationController@pin');

Route::get('/donation/confirm-data/{transactionNum}/{formToken}/{merchOrderId}/{donationID}', 'DonationController@confirmData');

Route::view('/donation/success', 'donation.success');

Route::view('/success', 'success');

Route::view('/fail', 'fail');

Route::resource('forms', FormController::class);

Route::resource('checkout', CheckoutController::class);


// Start Admin Route

Auth::routes();

// Admin User Data

Route::get('/users', 'UsersController@users_lists');

Route::get('/user-edit/{id}', 'UsersController@edit');

Route::any('/user-update', 'UsersController@update');

Route::get('/user/delete/{id}', 'UsersController@destroy');

// Donation Data

Route::get('/dashboard', 'AdminDonationController@transaction_all');

Route::get('/dashboard/{id}/donation-detail', 'AdminDonationController@detail');

Route::get('/dashboard/success', 'AdminDonationController@transaction_success');

Route::get('/dashboard/{id}/success-detail', 'AdminDonationController@success_detail');

Route::get('/dashboard/error', 'AdminDonationController@transaction_error');

Route::get('/dashboard/{id}/error-detail', 'AdminDonationController@error_detail');

Route::any('/filter', 'AdminDonationController@transaction_success_date_filter');

// Donation Tables

Route::get('/transaction-tables', 'AdminDonationController@list');

Route::get('/transaction-tables/success', 'AdminDonationController@callback_list');

Route::get('/transaction-tables/error', 'AdminDonationController@error_list');

// Donation type

Route::post('/donation-type/add', 'DonationTypeController@add');

Route::get('/donation-type', 'DonationTypeController@index');

Route::get('/donation-type/create', 'DonationTypeController@create');

Route::get('/donation-type/edit/{id}', 'DonationTypeController@edit');

Route::resource('/donation-type', 'DonationTypeController');

Route::get('/donation-type/delete/{id}', 'DonationTypeController@destroy');

Route::post('/donation-type-mm/add', 'DonationTypeMmController@add');

Route::get('/donation-type-mm', 'DonationTypeMmController@index');

Route::get('/donation-type-mm/create', 'DonationTypeMmController@create');

Route::get('/donation-type-mm/edit/{id}', 'DonationTypeMmController@edit');

Route::resource('/donation-type-mm', 'DonationTypeMmController');

Route::get('/donation-type-mm/delete/{id}', 'DonationTypeMmController@destroy');

// Payment Method

Route::post('/payment-method/add', 'MethodController@add');

Route::get('/payment-method', 'MethodController@index');

Route::get('/payment-method/create', 'MethodController@create');

Route::get('/payment-method/edit/{id}', 'MethodController@edit');

Route::resource('/payment-method', 'MethodController');

Route::get('/payment-method/delete/{id}', 'MethodController@destroy');

// Payment Provider

Route::post('/payment-provider/add', 'ProviderController@add');

Route::get('/payment-provider', 'ProviderController@index');

Route::get('/payment-provider/create', 'ProviderController@create');

Route::get('/payment-provider/edit/{id}', 'ProviderController@edit');

Route::resource('/payment-provider', 'ProviderController');

Route::get('/payment-provider/delete/{id}', 'ProviderController@destroy');

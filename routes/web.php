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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');

Route::get('auth/facebook', 'FacebookController@redirectToProvider');
Route::get('auth/facebook/callback', 'FacebookController@handleProviderCallback');

Route::resource('admin/promotions', 'PromotionController');
Route::resource('admin/coupons', 'CouponController');
Route::resource('admin/users', 'UserController');

Route::get('/coupon/coupon','CouponController@couponView');

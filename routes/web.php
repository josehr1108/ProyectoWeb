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

use App\Mail\Correo;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');
Route::get('home/contacto', 'HomeController@contact');

Route::get('auth/facebook', 'FacebookController@redirectToProvider');
Route::get('auth/facebook/callback', 'FacebookController@handleProviderCallback');

Route::group(['namespace'=>'Admin', 'prefix'=>'admin', 'as'=>'admin.'], function(){
    Route::resource('promotions', 'PromotionController');
    Route::resource('coupons', 'CouponController');
    Route::resource('users', 'UserController');
});

Route::get('/coupon/{id}','CouponController@couponView');
Route::get('/promotion/{id}','PromotionController@promotionView');


Route::get('/basicemail/{id}', 'MailContrioller@basic_email');
Route::get('/basicemailpro/{id}', 'MailContrioller@basic_emailPro');

Route::post('/commentCoupon/{id}/{user_name}/{message}', 'CouponController@commentCoupon');

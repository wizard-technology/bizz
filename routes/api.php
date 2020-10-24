<?php

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

Route::group([
    'middleware' => 'isStop',
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::post('forgetpassword', 'AuthController@forgetpassword');
    Route::post('verify_reset_password', 'AuthController@verify_reset_password');
    Route::post('change_password', 'AuthController@change_password');
    Route::get('home', 'HomeController@home');
    Route::get('types', 'HomeController@types');
    Route::get('company', 'HomeController@company');
    Route::get('product/{id}', 'HomeController@product');
    Route::get('product/get/{text}', 'HomeController@onSearch');
    Route::get('product/type/{type}', 'HomeController@getByType');
    Route::get('product/subcategory/{subcategory}', 'HomeController@getBySubcategory');
    Route::get('bizzcoin', 'HomeController@bizzcoin');
    Route::get('terms', 'HomeController@terms');
    Route::get('subcategory', 'HomeController@subcategories');
    Route::post('test', 'TestController@test');

    Route::group([
        'middleware' => ['auth:api','isUser'],
    ], function () {
        Route::post('verify', 'AuthController@verify_user');
        Route::group([
            'middleware' => 'checkVerify',
        ], function () {
            Route::get('logout', 'AuthController@logout');
            Route::get('user', 'AuthController@user');
            Route::post('password', 'AuthController@password');
            Route::put('update', 'AuthController@updateInfo');
            Route::get('product/user/{id}', 'HomeController@productUser');
            Route::post('favorate/{id}', 'HomeController@favorate');
            Route::get('favorates', 'HomeController@favorateGet');
            Route::post('send/report', 'HomeController@sendReport');
            Route::get  ('get/report', 'HomeController@getReport');
            Route::post('addToCart', 'HomeController@addToCart');
            Route::get('cart', 'HomeController@cartGet');
            Route::get('history', 'HomeController@cartGroup');
            Route::get('history/item/{cart}', 'HomeController@cartFinished');
            Route::post('cart/delete', 'HomeController@cartDelete');
            Route::post('cart/amount', 'HomeController@amountChange');
            Route::post('checkout', 'HomeController@checkOut');
            Route::post('payment', 'HomeController@payment');
        });
    });
});

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

Route::post('login', 'AuthController@login');

Route::group(
    [
        'middleware' => ['auth:api', 'isAdmin','checkVerify'],
    ],
    function () {
        Route::resource('product', 'ProductController');
        Route::resource('tag', 'TagController');
        Route::resource('type', 'TypeController');
        Route::resource('card', 'CardController');
    }
);
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('admin')->group(function() {

    Route::prefix('banners')->group(function() {
        Route::post('store', 'Banner\BannerController@store');
        Route::post('remove', 'Banner\BannerController@remove');
        Route::post('update', 'Banner\BannerController@update');
    });

    Route::prefix('subbanners')->group(function(){

        // Route::post('store', 'Subbanner\SubbannerController@store');
        // Route::post('remove', 'Subbanner\SubbannerController@remove');
        // Route::post('update', 'Subbanner\SubbannerController@update');

    });

    Route::prefix('hashtags')->group(function() {
        Route::post('store', 'Hashtag\HashtagController@store');
        Route::post('remove', 'Hashtag\HashtagController@remove');
        Route::post('update', 'Hashtag\HashtagController@update');
    });

    Route::prefix('products')->group(function() {
        Route::post('store', 'Product\ProductController@store');
        Route::post('remove', 'Product\ProductController@remove');
        Route::post('update', 'Product\ProductController@update');
    }); 
    
});
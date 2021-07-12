<?php

use Illuminate\Support\Facades\Route;

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

Route::localized(function() {

    Route::get('/', function (){
        return view('web.pages.home');
    })->name('web.index');

    Route::prefix('admin')->group(function() {

        Route::get('/', 'Admin\AdminController@index');
    
        Route::prefix('banners')->group(function() {
            Route::get('/', 'Banner\BannerController@index')
            ->name('admin.banners.index');
            
            Route::get('/new', 'Banner\BannerController@new')
            ->name('admin.banners.new');
        });
    
        Route::prefix('subbanners')->group(function() {
            Route::get('/', 'Subbanner\SubbannerController@index')
            ->name('admin.subbanners.index');
    
            Route::get('/new', 'Subbanner\SubbannerController@new')
            ->name('admin.subbanners.new');
        });
    
        Route::prefix('hashtags')->group(function() {
            Route::get('/', 'Hashtag\HashtagController@index')
            ->name('admin.hashtags.index');
    
            Route::get('/new', 'Hashtag\HashtagController@new')
            ->name('admin.hashtags.new');
        });
    
        Route::prefix('products')->group(function( ){
            Route::get('/', 'App\Http\Controllers\Product\ProductController@index')
            ->name('admin.products.index');
    
            Route::get('/new', 'App\Http\Controllers\Product\ProductController@new')
            ->name('admin.products.new');
            
            Route::get('/edit/{product}', 'App\Http\Controllers\Product\ProductController@edit')
            ->name('admin.products.edit');
    
            Route::get('/stock', 'App\Http\Controllers\Product\ProductController@details')
            ->name('admin.products.stock');
            
            Route::post('/store', 'App\Http\Controllers\Product\ProductController@store')
            ->name('admin.products.store');
    
            Route::post('/update/{product}', 'App\Http\Controllers\Product\ProductController@update')
            ->name('admin.products.update');
    
            Route::post('/remove/{product}', 'App\Http\Controllers\Product\ProductController@remove')
            ->name('admin.products.remove');
    
            Route::prefix('images')->group(function() {
                Route::post('store', 'App\Http\Controllers\Product\ProductImageController@store')
                ->name('admin.products.images.store');
    
                Route::post('remove/{image:name}', 'App\Http\Controllers\Product\ProductImageController@remove')
                ->name('admin.products.images.remove');
            });
        });
    
    });    

});

Route::fallback(\CodeZero\LocalizedRoutes\Controller\FallbackController::class)
->middleware(\CodeZero\LocalizedRoutes\Middleware\SetLocale::class);
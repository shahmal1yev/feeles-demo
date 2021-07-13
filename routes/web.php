<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Banner\BannerController;
use App\Http\Controllers\Subbanner\SubbannerController;
use App\Http\Controllers\Hashtag\HashtagController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Product\ProductImageController;
use App\Http\Controllers\Product\ProductDetailController;

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

Route::localized(function () {
    
    Route::get('/', function (){
        return view('web.pages.home');
    })->name('web.index');

    Route::prefix('admin')->group(function() {

        Route::get('/', '\App\Http\Controllers\Admin\AdminController@index');
    
        Route::prefix('banners')->group(function() {
            Route::get('/', '\App\Http\Controllers\Banner\BannerController@index')
            ->name('admin.banners.index');
            
            Route::get('/new', '\App\Http\Controllers\Banner\BannerController@new')
            ->name('admin.banners.new');
        });
    
        Route::prefix('subbanners')->group(function() {
            Route::get('/', '\App\Http\Controllers\Subbanner\SubbannerController@index')
            ->name('admin.subbanners.index');
    
            Route::get('/new', '\App\Http\Controllers\Subbanner\SubbannerController@new')
            ->name('admin.subbanners.new');
        });
    
        Route::prefix('hashtags')->group(function() {
            Route::get('/', '\App\Http\Controllers\Hashtag\HashtagController@index')
            ->name('admin.hashtags.index');
    
            Route::get('/new', '\App\Http\Controllers\Hashtag\HashtagController@new')
            ->name('admin.hashtags.new');
        });
    
        Route::prefix('products')->group(function( ){
            Route::get('/', '\App\Http\Controllers\Product\ProductController@index')
            ->name('admin.products.index');
    
            Route::get('/new', '\App\Http\Controllers\Product\ProductController@new')
            ->name('admin.products.new');
            
            Route::get('/edit/{product}', '\App\Http\Controllers\Product\ProductController@edit')
            ->name('admin.products.edit');
     
            Route::post('/store', '\App\Http\Controllers\Product\ProductController@store')
            ->name('admin.products.store');
    
            Route::post('/update/{product}', '\App\Http\Controllers\Product\ProductController@update')
            ->name('admin.products.update');
    
            Route::post('/remove/{product}', '\App\Http\Controllers\Product\ProductController@remove')
            ->name('admin.products.remove');
    
            Route::prefix('images')->group(function() {
                Route::post('store', '\App\Http\Controllers\Product\ProductImageController@store')
                ->name('admin.products.images.store');
    
                Route::post('remove/{image:name}', '\App\Http\Controllers\Product\ProductImageController@remove')
                ->name('admin.products.images.remove');
            });

            Route::prefix('stock')->group(function() {
                Route::get('/{product}', '\App\Http\Controllers\Product\ProductDetailController@details')
                ->name('admin.products.stock');

                Route::get('/new/{product}', '\App\Http\Controllers\Product\ProductDetailController@new')
                ->name('admin.products.stock.new');
            });
        });
    });
});

Route::prefix('admin')->group(function() {
    Route::prefix('products')->group(function() {
        Route::prefix('stock')->group(function() {
            Route::post('/store/{product}', '\App\Http\Controllers\Product\ProductDetailController@store');
            Route::post('/update/{productDetail}', '\App\Http\Controllers\Product\ProductDetailController@update');
            Route::post('/remove/{productDetail}', '\App\Http\Controllers\Product\ProductDetailController@remove');
        });
    });
});

Route::fallback(\CodeZero\LocalizedRoutes\Controller\FallbackController::class)
    ->middleware(\CodeZero\LocalizedRoutes\Middleware\SetLocale::class);
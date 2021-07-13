<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Banner\BannerController;
use App\Http\Controllers\Subbanner\SubbannerController;
use App\Http\Controllers\Hashtag\HashtagController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Product\ProductImageController;

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

        Route::get('/', 'AdminController@index');
    
        Route::prefix('banners')->group(function() {
            Route::get('/', 'BannerController@index')
            ->name('admin.banners.index');
            
            Route::get('/new', 'BannerController@new')
            ->name('admin.banners.new');
        });
    
        Route::prefix('subbanners')->group(function() {
            Route::get('/', 'SubbannerController@index')
            ->name('admin.subbanners.index');
    
            Route::get('/new', 'SubbannerController@new')
            ->name('admin.subbanners.new');
        });
    
        Route::prefix('hashtags')->group(function() {
            Route::get('/', 'HashtagController@index')
            ->name('admin.hashtags.index');
    
            Route::get('/new', 'HashtagController@new')
            ->name('admin.hashtags.new');
        });
    
        Route::prefix('products')->group(function( ){
            Route::get('/', 'ProductController@index')
            ->name('admin.products.index');
    
            Route::get('/new', 'ProductController@new')
            ->name('admin.products.new');
            
            Route::get('/edit/{product}', 'ProductController@edit')
            ->name('admin.products.edit');
    
            Route::get('/stock', 'ProductController@details')
            ->name('admin.products.stock');
            
            Route::post('/store', 'ProductController@store')
            ->name('admin.products.store');
    
            Route::post('/update/{product}', 'ProductController@update')
            ->name('admin.products.update');
    
            Route::post('/remove/{product}', 'ProductController@remove')
            ->name('admin.products.remove');
    
            Route::prefix('images')->group(function() {
                Route::post('store', 'ProductImageController@store')
                ->name('admin.products.images.store');
    
                Route::post('remove/{image:name}', 'ProductImageController@remove')
                ->name('admin.products.images.remove');
            });
        });
    
    });

});

Route::fallback(\CodeZero\LocalizedRoutes\Controller\FallbackController::class)
    ->middleware(\CodeZero\LocalizedRoutes\Middleware\SetLocale::class);

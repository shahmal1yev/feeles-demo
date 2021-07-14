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

        Route::prefix('colors')->group(function() {
            Route::get('/', '\App\Http\Controllers\Color\ColorController@index')
            ->name('admin.colors.index');

            Route::get('/new', '\App\Http\Controllers\Color\ColorController@new')
            ->name('admin.colors.new');
        });

        Route::prefix('sizes')->group(function() {
            Route::get('/', '\App\Http\Controllers\Size\SizeController@index')
            ->name('admin.sizes.index');

            Route::get('/new', '\App\Http\Controllers\Size\SizeController@new')
            ->name('admin.sizes.new');
        });

        Route::prefix('fabrics')->group(function() {
            Route::get('/', '\App\Http\Controllers\Fabric\FabricController@index')
            ->name('admin.fabrics.index');

            Route::get('/new', '\App\Http\Controllers\Fabric\FabricController@new')
            ->name('admin.fabrics.new');
        });

        Route::prefix('class-groups')->group(function() {
            Route::get('/', '\App\Http\Controllers\ClassGroup\ClassGroupController@index')
            ->name('admin.class.index');

            Route::get('/new', '\App\Http\Controllers\ClassGroup\ClassGroupController@new')
            ->name('admin.class.new');
        });
    
        Route::prefix('/categories', function() {
            Route::get('/', '\App\Http\Controllers\Category\CategoryController@index')
            ->name('admin.categories.index');
            
            Route::get('/new', '\App\Http\Controllers\Category\CategoryController@new')
            ->name('admin.categories.new');
        });

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
    Route::prefix('colors')->group(function() {
        Route::post('/store', '\App\Http\Controllers\Color\ColorController@store')
        ->name('admin.colors.store');
        
        Route::post('/update/{color}', '\App\Http\Controllers\Color\ColorController@update')
        ->name('admin.colors.update');

        Route::post('/remove/{color}', '\App\Http\Controllers\Color\ColorController@remove')
        ->name('admin.colors.remove');
    });
    
    Route::prefix('sizes')->group(function() {
        Route::post('/store', '\App\Http\Controllers\Size\SizeController@store')
        ->name('admin.sizes.store');

        Route::post('/update/{size}', '\App\Http\Controllers\Size\SizeController@update')
        ->name('admin.sizes.update');

        Route::post('/remove/{size}', '\App\Http\Controllers\Size\SizeController@remove')
        ->name('admin.sizes.remove');
    });

    Route::prefix('fabrics')->group(function() {
        Route::post('/store', '\App\Http\Controllers\Fabric\FabricCOntroller@store')
        ->name('admin.fabrics.store');

        Route::post('/update/{fabric}', '\App\Http\Controllers\Fabric\FabricCOntroller@update')
        ->name('admin.fabrics.update');

        Route::post('/remove/{fabric}', '\App\Http\Controllers\Fabric\FabricCOntroller@remove')
        ->name('admin.fabrics.remove');
    });

    Route::prefix('class-groups')->group(function() {
        Route::post('/store', '\App\Http\Controllers\ClassGroup\ClassGroupController@store')
        ->name('admin.class.store');

        Route::post('/update/{class}', '\App\Http\Controllers\ClassGroup\ClassGroupController@update')
        ->name('admin.class.update');

        Route::post('/remove/{class}', '\App\Http\Controllers\ClassGroup\ClassGroupController@remove')
        ->name('admin.class.remove');
    });

    Route::prefix('categories')->group(function() {
        Route::post('/store', '\App\Http\Controllers\Category\CategoryController@store')
        ->name('admin.categories.store');

        Route::post('/update/{category}', '\App\Http\Controllers\Category\CategoryController@update')
        ->name('admin.categories.update');

        Route::post('/remove/{category}', '\App\Http\Controllers\Category\CategoryController@remove')
        ->name('admin.categories.remove');
    });

    Route::prefix('banners')->group(function() {
        Route::post('/store', '\App\Http\Controllers\Banner\BannerController@store')
        ->name('admin.banners.store');

        Route::post('/update/{banner}', '\App\Http\Controllers\Banner\BannerController@update')
        ->name('admin.banners.update');

        Route::post('/remove/{banner}', '\App\Http\Controllers\Banner\BannerController@remove')
        ->name('admin.banners.remove');
    });

    Route::prefix('subbanners')->group(function() {
        Route::post('/store', '\App\Http\Controllers\Subbanner\SubbannerController@store')
        ->name('admin.subbanners.store');

        Route::post('/update/{subbanner}', '\App\Http\Controllers\Subbanner\SubbannerController@update')
        ->name('admin.subbanners.update');

        Route::post('/remove/{subbanner}', '\App\Http\Controllers\Subbanner\SubbannerController@remove')
        ->name('admin.subbanners.remove');
    });

    Route::prefix('hashtags')->group(function() {
        Route::post('/store', '\App\Http\Controllers\Hashtag\HashtagController@store')
        ->name('admin.hashtags.store');

        Route::post('/update/{hashtag}', '\App\Http\Controllers\Hashtag\HashtagController@update')
        ->name('admin.hashtags.update');

        Route::post('/remove/{hashtag}', '\App\Http\Controllers\Hashtag\HashtagController@remove')
        ->name('admin.hashtags.remove');
    });

    Route::prefix('menu')->group(function() {
        Route::prefix('item')->group(function() {
            Route::post('/store', '\App\Http\Controllers\Menu\MenuController@store')
            ->name('admin.menu.item.store');

            Route::post('/update/{menuItem}', '\App\Http\Controllers\Menu\MenuController@update')
            ->name('admin.menu.item.update');

            Route::post('/remove/{menuItem}', '\App\Http\Controllers\Menu\MenuController@remove')
            ->name('admin.menu.item.remove');
        });

        Route::prefix('dropdown')->group(function() {
            Route::prefix('item')->group(function() {
                Route::post('/store', '\App\Http\Controllers\Menu\Dropdown\DropdownController@store')
                ->name('admin.menu.dropdown.item.store');

                Route::post('/update/{dropdownItem}', '\App\Http\Controllers\Menu\Dropdown\DropdownController@update')
                ->name('admin.menu.dropdown.item.update');

                Route::post('/remove/{dropdownItem}', '\App\Http\Controllers\Menu\Dropdown\DropdownController@remove')
                ->name('admin.menu.dropdown.item.remove');
            });

            Route::prefix('group-title')->group(function() {
                Route::post('/store', '\App\Http\Controllers\Menu\Dropdown\GroupTitleController@store')
                ->name('admin.menu.dropdown.group-title.store');

                Route::post('/update/{groupTitle}', '\App\Http\Controllers\Menu\Dropdown\GroupTitleController@update')
                ->name('admin.menu.dropdown.group-title.update');
                
                Route::post('/remove/{groupTitle}', '\App\Http\Controllers\Menu\Dropdown\GroupTitleController@remove')
                ->name('admin.menu.dropdown.group-title.remove');
            });
        });
    });

    Route::prefix('products')->group(function() {
        Route::prefix('stock')->group(function() {
            Route::post('/store/{product}', '\App\Http\Controllers\Product\ProductDetailController@store')
            ->name('admin.products.stock.store');

            Route::post('/update/{productDetail}', '\App\Http\Controllers\Product\ProductDetailController@update')
            ->name('admin.products.stock.update');
            
            Route::post('/remove/{productDetail}', '\App\Http\Controllers\Product\ProductDetailController@remove')
            ->name('admin.products.stock.remove');
        });
    });
});

Route::fallback(\CodeZero\LocalizedRoutes\Controller\FallbackController::class)
    ->middleware(\CodeZero\LocalizedRoutes\Middleware\SetLocale::class);
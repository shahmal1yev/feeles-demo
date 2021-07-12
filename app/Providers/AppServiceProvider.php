<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use App\Models\Menu\MenuItem as MainMenuItem;

use App\Models\Banner\Banner;
use App\Models\Subbanner\Subbanner;

use App\Models\Size\Size;
use App\Models\Color\Color;
use App\Models\Category\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function() {
            View::share(
                'menu', 
                MainMenuItem::get()
            );
        });

        View::composer('web.pages.home', function() {
            View::share(
                'banners', 
                Banner::get()
            );

            View::share(
                'subbanners',
                Subbanner::get()
            );

            View::share(
                'sizes',
                Size::get()
            );

            View::share(
                'colors',
                Color::get()
            );

            View::share(
                'categories',
                Category::get()
            );
        });

    }
}

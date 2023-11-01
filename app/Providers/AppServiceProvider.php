<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        View::composer('*', function ($view) {
            View::share('categories', Category::where('status',1)->get());
            View::share('cartCollection',\Cart::getContent());
            View::share('cartTotalQuantity',\Cart::getTotalQuantity());
            View::share('subTotal',\Cart::getSubTotal());
            View::share('setting', Setting::first());

        });
        Paginator::useBootstrap();
    }
}

<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Location;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


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
        //
//        View::composer('layouts.app',  function ($view) {
//            $view->with('locations', Location::All());
//            $view->with('categories', Category::All());
//            $view->with('no_of_beds', range(1,10),);
//            $view->with('no_of_baths', range(1,10),);
//        });
    }
}

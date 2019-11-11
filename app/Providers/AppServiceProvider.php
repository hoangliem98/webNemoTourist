<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Tour_Category;
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
        view()->composer('layout.header',function($view){
            $tourcategory = Tour_Category::all();
            $view->with('tourcategory',$tourcategory); 
        });
    }
}

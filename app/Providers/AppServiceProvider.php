<?php

namespace App\Providers;

use App\Http\View\Composers\TypeWithValuesForProductComposer;
use App\Models\Category;
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
        View::share('categories', Category::all()->toArray());
        View::composer('product/form', TypeWithValuesForProductComposer::class
        );
    }
}

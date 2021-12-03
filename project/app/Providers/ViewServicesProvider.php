<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;

class ViewServicesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        View()->composer('admin.includes.header', function ($view) {
            $view->with('Categories', Category::get());
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

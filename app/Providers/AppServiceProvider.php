<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

//Handle specified key was too long
use Illuminate\Support\Facades\Schema;

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
        //Handle specified keys was too long 
        Schema::defaultStringLength(191);
    }
}

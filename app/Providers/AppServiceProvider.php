<?php

namespace App\Providers;

use App\Models\Basic;
use App\Observers\BasicObserver;
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
        Basic::observe(BasicObserver::class);
    }
}

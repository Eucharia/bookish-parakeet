<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Repo\EloquentRepo;
use App\Repositories\Repo\TodoRepo;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // tell laravel the interface to load

        $this->app->bind('App\\Repositories\\Repo\\TodoRepo', 'App\\Repositories\\Repo\\EloquentRepo');
    }
}

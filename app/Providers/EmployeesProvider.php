<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class EmployeesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Services\Contracts\EmployeesInterface', function ($app) {
          return new \App\Services\Employees();
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

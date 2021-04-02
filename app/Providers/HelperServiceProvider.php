<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind('CsvHeaderValidator', function () {
            return new \App\Helpers\CsvHeaderValidator();
        });
        $this->app->bind('CsvToArrayConverter', function () {
            return new \App\Helpers\CsvToArrayConverter();
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

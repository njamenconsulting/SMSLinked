<?php

namespace App\Providers;

use App\Repositories\ContactRepositoryInterface;
use App\Repositories\Eloquent\ContactRepository;

use App\Repositories\GroupRepositoryInterface;
use App\Repositories\Eloquent\GroupRepository;

use App\Repositories\EloquentRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(GroupRepositoryInterface::class, GroupRepository::class);
        $this->app->bind(ContactRepositoryInterface::class, ContactRepository::class);
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

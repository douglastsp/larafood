<?php

namespace App\Providers;

use App\Repositories\CategoryRepository;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\TableRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\TenantRepositoryInterface;
use App\Repositories\TableRepository;
use App\Repositories\TenantRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //When it tries to create an object of TenantRespositoryInterface, create an object of TenantRepository instead
        $this->app->bind(
            TenantRepositoryInterface::class,
            TenantRepository::class
        );

        $this->app->bind(
            CategoryRepositoryInterface::class,
            CategoryRepository::class
        );

        $this->app->bind(
            TableRepositoryInterface::class,
            TableRepository::class
        );
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

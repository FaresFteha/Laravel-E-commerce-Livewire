<?php

namespace App\Providers;

use App\Repository\categoryRepository;
use App\Repository\colorRepository;
use App\Repository\productRepository;
use App\Repository\sliderRepository;
use App\RepositoryInterface\categoryIntrface;
use App\RepositoryInterface\colorIntrface;
use App\RepositoryInterface\productIntrface;
use App\RepositoryInterface\slederIntrface;
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
        $this->app->bind(
            categoryIntrface::class,
            categoryRepository::class
        );
        $this->app->bind(
            productIntrface::class,
            productRepository::class
        );

        $this->app->bind(
            colorIntrface::class,
            colorRepository::class
        );
        $this->app->bind(
            slederIntrface::class,
            sliderRepository::class
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

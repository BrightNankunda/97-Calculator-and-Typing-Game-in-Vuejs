<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\GadgetsRepositoryInterface;
use App\Repositories\GadgetsRepository;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(GadgetsRepositoryInterface::class, GadgetsRepository::class);
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Framework\Core\Repositories\MenuRepository;
use Framework\Core\Repositories\MenuRepositoryContract;
use Framework\Core\Services\MenuService;
use Framework\Core\Services\MenuServiceContract;

class MenuServiceProvider extends ServiceProvider
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
        //
        $this->app->bind(MenuRepositoryContract::class, MenuRepository::class);
        $this->app->bind(MenuServiceContract::class, MenuService::class);
    }
}

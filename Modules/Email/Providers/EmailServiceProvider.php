<?php

namespace Modules\Email\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;
use Framework\Core\Services\MenuServiceContract;
use Framework\Core\Entities\Menu;
use Framework\Core\Entities\SubMenu;
use Framework\Core\Entities\MenuItem;

class EmailServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerFactories();
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->registerMenu();
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            __DIR__.'/../Config/config.php' => config_path('email.php'),
        ], 'config');
        $this->mergeConfigFrom(
            __DIR__.'/../Config/config.php', 'email'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/email');

        $sourcePath = __DIR__.'/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ],'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/email';
        }, \Config::get('view.paths')), [$sourcePath]), 'email');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/email');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'email');
        } else {
            $this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'email');
        }
    }

    /**
     * Register an additional directory of factories.
     * 
     * @return void
     */
    public function registerFactories()
    {
        if (! app()->environment('production')) {
            app(Factory::class)->load(__DIR__ . '/../Database/factories');
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }

    private function registerMenu(){
        $menu = $this->app->make(MenuServiceContract::class);
        $menu->addMenu(new Menu("", "Email Marketing", "fa fa-envelope"));
        $menuItem = array(new MenuItem('/test1', 'Test 1'), new MenuItem('/test2', 'Test 2')); 
        $menu->addSubmenu(array(new SubMenu("/books", "List books" , $menuItem), new SubMenu("/books/create", "Create book", null)));
    }
}

<?php

namespace Modules\SMS\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;
use Framework\Core\Services\MenuServiceContract;
use Framework\Core\Entities\Menu;
use Framework\Core\Entities\SubMenu;
use Framework\Core\Entities\MenuItem;

class SMSServiceProvider extends ServiceProvider
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
            __DIR__.'/../Config/config.php' => config_path('sms.php'),
        ], 'config');
        $this->mergeConfigFrom(
            __DIR__.'/../Config/config.php', 'sms'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/sms');

        $sourcePath = __DIR__.'/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ],'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/sms';
        }, \Config::get('view.paths')), [$sourcePath]), 'sms');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/sms');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'sms');
        } else {
            $this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'sms');
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
        $menu->addMenu(new Menu("", "SMS Service", "fa fa-comments-o"));
        $menuItem = array(new MenuItem('/test1', 'Test 1'), new MenuItem('/test2', 'Test 2')); 
        $menu->addSubmenu(array(new SubMenu("/books", "List books" , $menuItem), new SubMenu("/books/create", "Create book", null)));
    }
}

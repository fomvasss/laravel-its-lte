<?php

namespace Fomvasss\ItsLte;

use Illuminate\Support\Facades\Route;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if (!$this->app->environment('production')) {
            $this->registerRoutes();
        }

        $this->loadTranslationsFrom(
            __DIR__.'/../resources/lang', 'lte'
        );

        $this->loadViewsFrom(
            __DIR__.'/../resources/views', 'lte'
        );

        $this->registerPublishing();
    }

    private function registerRoutes()
    {
        Route::namespace('Fomvasss\ItsLte\Http\Controllers')
            ->as('lte.')
            ->prefix(config('its-lte.prefix'))
            ->middleware(config('its-lte.middleware', []))
            ->group(function () {
                $this->loadRoutesFrom(__DIR__.'/Http/routes.php');
            });
    }

    /**
     * Register the package's publishable resources.
     *
     * @return void
     */
    private function registerPublishing()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/its-lte.php' => config_path('its-lte.php'),
            ], 'lte-config');

            $this->publishes([
                __DIR__.'/../public' => public_path('vendor/its-lte'),
            ], 'lte-assets');

            $this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/lte'),
            ], 'lte-lang');

            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/lte'),
            ], 'lte-views');

            foreach (['profile', 'auth', 'content', 'fields', 'layouts', 'parts',] as $key) {
                $this->publishes([
                    __DIR__.'/../resources/views/'.$key => resource_path('views/vendor/lte/'.$key),
                ], 'lte-view-'.$key);
            }
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/its-lte.php', 'its-lte');

        $this->commands([
            Console\InstallCommand::class,
            Console\PublishCommand::class,
        ]);
    }
}

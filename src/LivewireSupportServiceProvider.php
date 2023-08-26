<?php

namespace Wawans\LivewireSupport;

use Illuminate\Support\ServiceProvider;
use Wawans\LivewireSupport\Console\ControllerLivewireMakeCommand;
use Wawans\LivewireSupport\Console\FormLivewireCommand;
use Wawans\LivewireSupport\Console\TableLivewireCommand;

class LivewireSupportServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'livewire-support');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'livewire-support');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('livewire-support.php'),
            ], 'livewire-support:config');

            // Publishing the views.
            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/livewire-support'),
            ], 'livewire-support:views');

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/livewire-support'),
            ], 'livewire-support:assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/livewire-support'),
            ], 'livewire-support:lang');*/

            // Publishing stubs.
            $this->publishes([
                __DIR__.'/../stubs' => base_path('stubs'),
            ], 'livewire-support:stubs');

            // Registering package commands.
            $this->commands([
                FormLivewireCommand::class,
                TableLivewireCommand::class,
                ControllerLivewireMakeCommand::class,
            ]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'livewire-support');

        // Register the main class to use with the facade
        $this->app->singleton('livewire-support', function () {
            return new LivewireSupport;
        });
    }
}

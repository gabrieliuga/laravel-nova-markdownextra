<?php

namespace Gabrieliuga\Markdownextra;

use Gabrieliuga\Markdownextra\Http\Middleware\Authorize;
use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;
use Illuminate\Support\Facades\Route;

class FieldServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Nova::serving(function (ServingNova $event) {
            Nova::script('markdownextra', __DIR__.'/../dist/js/field.js');
            Nova::style('markdownextra', __DIR__.'/../dist/css/field.css');
        });

        $this->app->booted(function () {
            $this->routes();
        });

        if ($this->app->runningInConsole()) {
            // Publishing the config.
            $this->publishes([
                __DIR__.'/../config/markdownextra.php' => config_path('markdownextra.php'),
            ], 'markdownextra');
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/markdownextra.php', 'markdownextra');
    }

    protected function routes()
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        Route::middleware(['nova', 'api'])
            ->prefix('nova-vendor/gabrieliuga/markdownextra')
            ->group(__DIR__.'/../routes/api.php');
    }
}

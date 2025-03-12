<?php

namespace BhavneeshGoyal99\LaravelGithubCu;

use Illuminate\Support\ServiceProvider;

class LaravelGithubPackageServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Publish config files
        $this->publishes([
            __DIR__.'/config/mypackage.php' => config_path('mypackage.php'),
        ]);

        // Load Routes
        if (file_exists(__DIR__.'/routes/web.php')) {
            $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        }

        // Load Migrations
        $this->loadMigrationsFrom(__DIR__.'/migrations');

        // Load Views
        $this->loadViewsFrom(__DIR__.'/resources/views', 'mypackage');
    }

    public function register()
    {
        // Merge config file
        $this->mergeConfigFrom(__DIR__.'/config/mypackage.php', 'mypackage');
    }
}

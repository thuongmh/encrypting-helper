<?php

namespace thuongmh\helperEncryption;

use Illuminate\Support\ServiceProvider;
class HelperPackageServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->make('encryptingHelper\thuongmh\helperEncryption\EncryptionController');
    }

    public function boot ()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
        $this->loadMigrationsFrom(__DIR__ . '/migrations');
        $this->publishes([__DIR__ . '/views' => resource_path('views/')]);
        $this->loadViewsFrom(__DIR__ . '/views', 'thuongmh');
    }
}

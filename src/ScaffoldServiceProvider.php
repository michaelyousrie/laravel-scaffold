<?php

namespace LaravelScaffold;

use Illuminate\Support\ServiceProvider;
use LaravelScaffold\Commands\MakeEntity;

class ScaffoldServiceProvider extends ServiceProvider
{
    public function register()
    {
        // 
    }

    public function boot()
    {
        $this->commands([
            MakeEntity::class
        ]);
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
        $this->loadMigrationsFrom(__DIR__ . '/Migrations');
        $this->loadTranslationsFrom(__DIR__ . '/Translations', 'scaffold');
    }
}

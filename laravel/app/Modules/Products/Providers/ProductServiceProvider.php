<?php

namespace App\Modules\Products\Providers;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'wf.products');

        Route::middleware(['web', 'auth'])
            ->prefix('sistema')
            ->group(__DIR__ . '/../routes/web.php');

        Route::middleware(['api', 'jwt.auth', 'jwt.refresh'])
            ->prefix('api')
            ->group(__DIR__ . '/../routes/api.php');

        Relation::morphMap([
            'products' => 'App\Modules\Products\Product',
        ]);
    }

    public function register()
    {
        $this->app->register(ProductEventServiceProvider::class);
        $this->app->register(ProductAuthServiceProvider::class);
    }
}
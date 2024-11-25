<?php

namespace App\Modules\Leads\Providers;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class LeadServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'wf.leads');

        Route::middleware(['web', 'auth'])
            ->prefix('sistema')
            ->group(__DIR__ . '/../routes/web.php');

        Route::middleware(['api', 'jwt.auth', 'jwt.refresh'])
            ->prefix('api')
            ->group(__DIR__ . '/../routes/api.php');

        Relation::morphMap([
            'leads' => 'App\Modules\Leads\Lead',
        ]);
    }

    public function register()
    {
        $this->app->register(LeadEventServiceProvider::class);
        $this->app->register(LeadAuthServiceProvider::class);
    }
}

<?php

namespace App\Modules\Products\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider;

class ProductAuthServiceProvider extends AuthServiceProvider
{
    protected $policies = [
        'App\Modules\Products\Product' => 'App\Modules\Products\ProductPolicy',
    ];
    
    public function register()
    {
        $this->registerPolicies();
    }
}

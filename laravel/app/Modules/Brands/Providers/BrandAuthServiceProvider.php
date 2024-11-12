<?php

namespace App\Modules\Brands\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider;

class BrandAuthServiceProvider extends AuthServiceProvider
{
    protected $policies = [
        'App\Modules\Brands\Brand' => 'App\Modules\Brands\BrandPolicy',
    ];
    
    public function register()
    {
        $this->registerPolicies();
    }
}

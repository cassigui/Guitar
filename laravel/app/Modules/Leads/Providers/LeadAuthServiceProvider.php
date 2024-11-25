<?php

namespace App\Modules\Leads\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider;

class LeadAuthServiceProvider extends AuthServiceProvider
{
    protected $policies = [
        'App\Modules\Leads\Lead' => 'App\Modules\Leads\LeadPolicy',
    ];
    
    public function register()
    {
        $this->registerPolicies();
    }
}

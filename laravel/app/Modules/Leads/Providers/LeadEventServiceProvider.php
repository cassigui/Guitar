<?php

namespace App\Modules\Leads\Providers;

use App\Modules\Leads\Lead;
use App\Modules\Leads\LeadObserver;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class LeadEventServiceProvider extends ServiceProvider
{
    public function boot()
    {
        parent::boot();
    }

}

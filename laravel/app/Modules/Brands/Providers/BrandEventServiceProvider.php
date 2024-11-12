<?php

namespace App\Modules\Brands\Providers;

use App\Modules\Brands\Brand;
use App\Modules\Brands\BrandObserver;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class BrandEventServiceProvider extends ServiceProvider
{
    public function boot()
    {
        parent::boot();
    }

}

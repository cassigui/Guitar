<?php

namespace App\Modules\Banners\Providers;

use App\Modules\Banners\Banner;
use App\Modules\Banners\BannerObserver;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class BannerEventServiceProvider extends ServiceProvider
{
    public function boot()
    {
        parent::boot();
    }

}

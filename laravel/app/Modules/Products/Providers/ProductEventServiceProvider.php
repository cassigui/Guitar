<?php

namespace App\Modules\Products\Providers;

use App\Modules\Products\Product;
use App\Modules\Products\ProductObserver;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class ProductEventServiceProvider extends ServiceProvider
{
    public function boot()
    {
        parent::boot();
    }

}

<?php

namespace App\Modules\Comments\Providers;

use App\Modules\Comments\Comment;
use App\Modules\Comments\CommentObserver;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class CommentEventServiceProvider extends ServiceProvider
{
    public function boot()
    {
        parent::boot();
    }

}

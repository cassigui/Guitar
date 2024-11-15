<?php

namespace App\Modules\Banners;

use App\Modules\Images\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id',
        'title',
        'mini-title',
        'description',
        'button_cta',
        'link'
    ];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable')->orderBy("order", "asc");
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable')->orderBy("order", "asc");
    }
}


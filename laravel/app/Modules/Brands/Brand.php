<?php

namespace App\Modules\Brands;

use App\Modules\Images\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug'
    ];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}

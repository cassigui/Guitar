<?php

namespace App\Modules\Products;

use App\Modules\Brands\Brand;
use App\Modules\Categories\Category;
use App\Modules\Images\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'price',
        'promo_price',
        'description',
        'brand_id',
    ];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable')->orderBy("order", "asc");
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable')->orderBy("order", "asc");
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}

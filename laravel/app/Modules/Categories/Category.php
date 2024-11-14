<?php

namespace App\Modules\Categories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{   
    use SoftDeletes;

    protected $fillable = [
        "name",
        "slug"
    ];
}

<?php

namespace App\Modules\Comments;

use App\Modules\Images\Image;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        "name",
        "profession",
        "message"
    ];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}

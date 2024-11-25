<?php

namespace App\Modules\Leads;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lead extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
        'msg_subject',
        'contact_name_enterprise',
    ];
}

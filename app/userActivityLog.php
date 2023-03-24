<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userActivityLog extends Model
{
    protected $fillable = [
        'name',
        'lname',
        'phone',
        'modify_user',
        'date_time',
        'role_as',
        'email',
    ];
}

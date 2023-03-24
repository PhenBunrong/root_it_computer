<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'phone_no',
        'state',
        'city',
        'country',
        'payment_type',
        'user_id',
        'pincode'
    ];
}

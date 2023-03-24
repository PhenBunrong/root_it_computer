<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlists extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
        'status',
    ];


    public function products(){
        return $this->belongsTo(Product::class, 'product_id');
    }
}

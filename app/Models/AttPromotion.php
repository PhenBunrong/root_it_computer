<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttPromotion extends Model
{
    protected $fillable = [
        'name',
        'product_id',
        'pro_info',
    ];

    public function Product(){
        return $this->belongsTo(Promotion::class, 'product_id');
    }

    public function getProductName(){
        return $this->Product->name;

    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    protected $fillable = [
        'product_id',
        'pro_info',
    ];

    public function Product(){
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function getProductName(){
        return $this->Product->name;

    }

    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageAttribute extends Model
{
    protected $fillable = [
        'name',
        'product_id',
        'image',
        'description',
    ];

    public function ProductImage(){
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function getProductName(){
        return $this->ProductImage->name;

    }
}

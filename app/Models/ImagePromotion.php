<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImagePromotion extends Model
{
    protected $fillable = [
        'name',
        'product_id',
        'image',
        'description',
    ];

    public function ProductImage(){
        return $this->belongsTo(Promotion::class, 'product_id');
    }

    public function getProductName(){
        return $this->ProductImage->name;

    }
}

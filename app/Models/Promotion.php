<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable = [
        'name', 
        'price', 
        'pro_code',
        'category_id',
        'subcategory_id',
        'brand_id',
        'title',
        'description',
        'qty',
        'spl_price',
        'tax_amt',
        'image',
        'status',
    ];

    public function Category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function getCategoryName(){
        if ($this->Category){
            return $this->Category->name;
        }
        return 'Walking Category';
    }

    public function SubCategory(){
        return $this->belongsTo(SubCategory::class, 'subcategory_id');
    }

    public function getSubCategory(){
        if ($this->SubCategory){
            return $this->SubCategory->name;
        }
        return 'Walking Category';
    }
    public function Brand(){
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function getBrandName(){
        if ($this->Brand){
            return $this->Brand->name;
        }
        return 'Walking Brand';
    }

    public function attributes(){
        return $this->hasMany('App\Models\AttPromotion', 'product_id');
    }

    public function attributesImage(){
        return $this->hasMany('App\Models\ImagePromotion', 'product_id');
    }

}

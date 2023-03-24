<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Product extends Model
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
        'discount',
        'tax_amt',
        'image',
        'status',
    ];

// Discount Product
    protected $appends = ['discount_price'];

    public function getDiscountPriceAttribute()
    {
        $today_date = Carbon::now()->format('Y-m-d');
        if($this->expiration_date > $today_date){
            $discount_price = $this->spl_price - ( $this->spl_price * ( $this->discount / 100 ));
            return $this->attributes['discount_price'] = ceil($discount_price);
        }else{
            return 0;
        }
    }



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
        return $this->hasMany('App\Models\ProductAttribute', 'product_id');
    }

    public function attributesImage(){
        return $this->hasMany('App\Models\ImageAttribute', 'product_id');
    }

    public static function cateCount($cat_id)
    {
        $catCount = Product::where(['category_id'=>$cat_id,'status'=>1])->count();
        return $catCount;
    }

    public static function brandCount($cat_id)
    {
        $catCount = Product::where(['brand_id'=>$cat_id,'status'=>1])->count();
        return $catCount;
    }

    public static function brandShow($cat_id)
    {
        $catCount = Product::where(['category_id'=>$cat_id,'status'=>1])->latest()->paginate(8);
        return $catCount;
    }

    public static function productBrand($cat_id)
    {
        $catCount = Product::where(['brand_id'=>$cat_id,'status'=>1])->get();
        return $catCount;
    }

    public static function productShow($cat_id)
    {
        $catCount = Product::where(['category_id'=>$cat_id,'status'=>1])->get();
        return $catCount;
    }


}

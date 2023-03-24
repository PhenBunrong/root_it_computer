<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'name',
        'category_id',
        'title',
        'image',
        'description',
        'status',
    ];

    public function Product(){
        return $this->belongsTo(Product::class, 'id');
    }

    public static function brandShow($cat_id)
    {
        $catCount = Brand::where(['id'=>$cat_id,'status'=>1])->get();
        return $catCount;
    }


}

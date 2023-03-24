<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Webpage extends Model
{
    protected $fillable = [
        'name',
        'product_id',
        'title',
        'description',
        'status',
    ];

    public function product(){
        return $this->belongsTo(product::class, 'product_id');
    }

    public static function categoryShow($cat_id)
    {
        $catCount = Webpage::with('product')->where(['product_id'=>$cat_id,'status'=>1])->get();
        return $catCount;
    }
    public function Category(){
        return $this->belongsTo(Category::class, 'product_id');
    }

    public function getCategoryName(){
        if ($this->Category){
            return $this->Category->name;
        }
        return 'Walking Category';
    }

}

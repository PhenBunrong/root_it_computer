<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = [
        'name',
        'image',
        'category_id',
        'title',
        'description',
        'status',
    ];

    public function Category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function getCategoryName(){
        if ($this->Category){
            return $this->Category->name;
        }
    }

    public static function brandShow($cat_id)
    {
        $catCount = SubCategory::where(['category_id'=>$cat_id,'status'=>1])->get();
        return $catCount;
    }
}

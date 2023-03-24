<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttSolutionImage extends Model
{
    protected $fillable = [
        'name',
        'solution_id',
        'description',
        'image',
        'status',
    ];

    public function ProductImage(){
        return $this->belongsTo(Solution::class, 'solution_id');
    }

    public function getSolutionName(){
        return $this->ProductImage->name;

    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    protected $fillable = [
        'name',
        'title',
        'description',
        'image',
        'status',
    ];


    public function attributesSolution(){
        return $this->hasMany('App\Models\AttSolutionImage', 'solution_id');
    }
}

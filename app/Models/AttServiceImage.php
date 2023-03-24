<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttServiceImage extends Model
{
    protected $fillable = [
        'name',
        'service_id',
        'description',
        'image',
        'status',
    ];

    public function ProductImage(){
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function getServiceName(){
        return $this->ProductImage->name;

    }
}

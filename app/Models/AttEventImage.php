<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttEventImage extends Model
{
    protected $fillable = [
        'name',
        'event_id',
        'description',
        'image',
        'status',
    ];

    public function EventsImage(){
        return $this->belongsTo(Events::class, 'event_id');
    }

    public function geEventsName(){
        return $this->EventsImage->name;

    }
}

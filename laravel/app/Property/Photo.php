<?php

namespace App\Property;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $table = 'property_photo';

    public function belongsToType()
    {
        return $this->belongsTo('App\Property\Photo\Type', 'id', 'photo_type_id');
    }
}

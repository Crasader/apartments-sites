<?php

namespace App\Property\Photo;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //
    protected $table = 'photo_type';

    public function hasPhoto()
    {
        return $this->hasMany('App\Property\Photo', 'photo_type_id', 'id');
    }
}

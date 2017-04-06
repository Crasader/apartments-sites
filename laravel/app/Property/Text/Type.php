<?php

namespace App\Property\Text;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //
    protected $table = 'property_text_type';

    public function hasText(){
        return $this->hasMany('App\Property\Text','property_text_type_id','id');
    }
}

<?php

namespace App\Property;

use Illuminate\Database\Eloquent\Model;

class Neighborhood extends Model
{
    //
    protected $table = 'property_neighborhood';

    public function belongsToProperty(){
        return $this->belongsTo('App\Property\Entity','fk_legacy_property_id','property_id');
    }

}

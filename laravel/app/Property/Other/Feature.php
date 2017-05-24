<?php

namespace App\Property\Other;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    //
    protected $table = 'property_other_feature';

    public function hasFeature()
    {
        return $this->hasMany('App\Other\Feature', 'id', 'other_feature_id');
    }
}

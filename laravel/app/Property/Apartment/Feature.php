<?php

namespace App\Property\Apartment;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Features as FeaturesTrait;

class Feature extends Model
{
    use FeaturesTrait;
    //
    protected $table = 'property_apartment_feature';

    public function hasFeature(){
        return $this->hasMany('App\Apartment\Feature','id','apartment_feature_id');
    }
}

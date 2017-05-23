<?php

namespace App\Property\Community;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    //
    protected $table = 'property_community_feature';

    public function hasFeature()
    {
        return $this->hasMany('App\Community\Feature', 'id', 'community_feature_id');
    }
}

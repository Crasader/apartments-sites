<?php

namespace App\Community;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    //
    protected $table = 'community_feature';

    public function belongsToProperty()
    {
        return $this->belongsTo('App\Property\Community\Feature', 'community_feature_id', 'id');
    }
}

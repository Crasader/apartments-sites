<?php

namespace App\Other;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    //
    protected $table = 'other_feature';

    public function belongsToProperty(){
        return $this->belongsTo('App\Property\Other\Feature','other_feature_id','id');
    }
}

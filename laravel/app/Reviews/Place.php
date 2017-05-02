<?php

namespace App\Reviews;

use Illuminate\Database\Eloquent\Model;
use App\Legacy\Property;
use App\Property\Entity;

class Place extends Model
{
    //
    protected $table = 'review_place';

    public function loadByLegacyProperty(Property $prop){
        return self::where('fk_legacy_property_id',$prop->id)->get();
    }

    public function loadByEntity(Entity $en){
        return $this->loadByLegacyProperty($en->getLegacyProperty());
    }

    public function loadBySite($s = null){
        if($s === null){
            $s = app()->make('App\Property\Site');
        }
        return $this->loadByLegacyProperty($s->getEntity()->getLegacyProperty());
    }
}

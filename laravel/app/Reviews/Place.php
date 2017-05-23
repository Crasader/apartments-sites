<?php

namespace App\Reviews;

use Illuminate\Database\Eloquent\Model;
use App\Legacy\Property;
use App\Property\Entity;

class Place extends Model
{
    //
    protected $table = 'review_place';

    public function loadByLegacyProperty(Property $prop, $type)
    {
        return self::where(
            ['fk_legacy_property_id' => $prop->id],
            ['place_type' => $type])->get();
    }

    public function loadByEntity(Entity $en, $type)
    {
        return $this->loadByLegacyProperty($en->getLegacyProperty(), $type);
    }

    public function loadBySite($s, $type)
    {
        if ($s === null) {
            $s = app()->make('App\Property\Site');
        }
        return $this->loadByLegacyProperty($s->getEntity()->getLegacyProperty(), $type);
    }
}

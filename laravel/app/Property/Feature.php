<?php

namespace App\Property;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Features as FeaturesTrait;

class Feature extends Model
{
    //
    use FeaturesTrait;
    public function decorator(array $row,$extra=null){
        $row['image'] = $this->getImagePath() .'/'. $row['image'];
        return $row;
    }

    public function getImagePath(){
        return Site::$instance->getEntity()->getWebPublicDirectory('neighborhood');
    }

}

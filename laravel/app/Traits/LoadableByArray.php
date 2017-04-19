<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use App\Legacy\Property as LegacyProperty;
use App\Property\Group as PropertyGroup;
use App\Interfaces\IFormatter;
use App\Property\Text as PropertyText;
use App\Property\Text\Type as TextType;
use App\Property\Site;
use App\Traits\Features as FeaturesTrait;
use App\Property\Apartment\Feature as ApartmentFeature;
use App\Property\Community\Feature as CommunityFeature;
use App\Property\Other\Feature as OtherFeature;
use Redis;
use App\Util\Util;

trait LoadableByArray {
    public function loadByArray(array $foo){
        foreach($foo as $key => $value){
            $this->$key = $value;
        }
    }
}


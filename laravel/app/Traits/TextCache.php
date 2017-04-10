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

trait TextCache {
    protected static $_textCache = [];
    public static function textCache(string $item,$callable){
        if(isset(self::$_textCache[$item])){
            return self::$_textCache[$item];
        }else{
            return self::$_textCache[$item] = $callable();
        }
    }
}


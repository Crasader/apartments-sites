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

trait TextCache {
    protected static $_textCache = [];
    protected static $_propertyTextLoaded = false;
    protected static $_objectInstance = null;
    public static function textCache(string $item,$callable){
        if(!Util::redisIsNew('textcache_' . $item)){
            $tc = Redis::get(Util::redisKey('textcache_' . $item));
            if(!empty($tc)){ 
                \Debugbar::info("Return cached: $item");
                return $tc; 
            }
        }
        if(isset(self::$_textCache[$item])){
            return self::$_textCache[$item];
        }else{
            $foo = self::$_textCache[$item] = $callable();
            Util::redisUpdate('textcache_' . $item,$foo);
            \Debugbar::info("Updated textcache_{$item}");
            return $foo;
        }
    }
    public static function setTextCache(string $item,$value){
        self::$_textCache[$item] = $value;
    }

}


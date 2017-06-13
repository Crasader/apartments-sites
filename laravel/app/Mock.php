<?php
namespace App;
use App\Util\Util;

class Mock
{
    const PROPERTY_CODE = 'propertyCode';
    const SERVER = 'server';
    public static $data;
    public static function setPropertyCode(string $p)
    {
        self::setData(self::PROPERTY_CODE,$p);
    }

    public static function setServer(string $s){
        self::setData(self::SERVER,$s);
    }

    public static function getServer(){
        return Util::arrayGet(self::$data,self::SERVER,null);
    }

    public static function setData(string $key,$value){
        self::$data[$key] = $value;
    }

    public static function get(string $p,$default=null)
    {
        return Util::arrayGet($data,$p,$default);
    }
}

<?php
namespace App;

class Mock {
    const PROPERTY_CODE = 'propertyCode';
    public static $data;
    public static function setPropertyCode(string $p){
        self::$data[self::PROPERTY_CODE] = $p;
    }

    public static function get(string $p){
        if(isset(self::$data[$p]))
            return self::$data[$p];
        return null;
    }
}

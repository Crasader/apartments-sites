<?php

namespace App\Util;

class Util 
{
    public static function isFpm(){
        return strcmp(php_sapi_name(),env('FPM_NAME')) == 0;
    }

    public static function isHome(){
        return (
            preg_match("|^/index|",$_SERVER['REQUEST_URI']) ||
            preg_match("|^/home|",$_SERVER['REQUEST_URI']) ||
            $_SERVER['REQUEST_URI'] == '/' ||
            strlen($_SERVER['REQUEST_URI']) == 0
        );
    }

    public static function formatRentPrice(string $price){
        return round($price,2,PHP_ROUND_HALF_UP);
    }
}

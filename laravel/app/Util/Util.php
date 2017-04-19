<?php

namespace App\Util;
use Redis;
use App\Property\Entity;
use App\Property\Site;

class Util 
{
    public static function isFpm(){
        return strcmp(php_sapi_name(),env('FPM_NAME')) == 0;
    }
    public static function redisIsNew(string $section){
        if(empty($time = Redis::get(self::redisKey($section) . "_updated"))){
            return true;
        }
        $bool =  $time > Redis::get(self::redisKey($section) . "_created");
        return $bool;
    }

    public static function redisUpdate(string $foo,$bar){
        self::redisSetCreated($foo,time());
        self::redisSetUpdated($foo,time());
        self::redisSet($foo,$bar);
    }

    public static function redisSet(string $foo,$bar){
        if(is_array($bar)){
            Redis:;set(self::redisKey($foo) . ':array:','1');
            Redis::set(self::redisKey($foo),self::redisEncode($bar));
            return;
        }
        Redis::set(self::redisKey($foo),$bar);
    }

    public static function redisFetchOrUpdate(string $key,$callable,$arrayType=false){
        if(!self::redisIsNew($key)){
            if($arrayType){
                return self::redisDecode(self::redisGet($key));
            }else{
                return self::redisGet($key);
            }
        }else{
            $foo = $callable();
            self::redisUpdate($key,is_array($foo) ? self::redisEncode($foo) : $foo);
            return $foo;
        }
    }

    public static function redisGet(string $foo){
        if(Redis::get(self::redisKey($foo) . ':array:') == '1'){
            return self::redisDecode(Redis::get(self::redisKey($foo)));
        }
        return Redis::get(self::redisKey($foo));
    }

    public static function redisSetCreated(string $foo,$time){
        Redis::set(self::redisKey($foo) . "_created",$time);
    }

    public static function redisSetUpdated(string $section){
        Redis::set(self::redisKey($section) . "_updated",time());
    }

    public static function redisKey(string $foo){
        if(Site::$instance === null){
            $site = app()->make("App\Property\Site");
        }else{
            $site = Site::$instance;
        }
        if($site->redis_alias !== null){
            return Site::$instance->redis_alias . ':' . $foo;
        }
        return $_SERVER['SERVER_NAME'] . ":$foo";
    }

    public static function redisEncode($object){
        return json_encode($object);
    }

    public static function redisDecode($str,$opts=true){
        return json_decode($str,$opts);
    }

    public static function redisGlobalKey(string $key){
        return "global_$key";
    }

    public static function isDev(){
        return strcmp(ENV('DEV'),'1') == 0;
    }

    public static function transformFloorplanName(string $name){
        return preg_replace("|[^a-z]+|","",strtolower($name));
    }

    public static function isResidentPortal(){
        return preg_match("|^/resident\-portal/,*|",$_SERVER['REQUEST_URI']);
    }

    public static function depluralize(string $s){
        return preg_replace("|[sS]{1}$|","",$s);
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

    public static function emailRegex(){
        return '^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$';
    }
}

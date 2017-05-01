<?php

namespace App\System;

use Illuminate\Database\Eloquent\Model;

class Session// extends Model
{
    //
    //protected $table ='contact';

    const USER_LOGIN_KEY = 'amc-userid';
    const CMS_USER_KEY = 'cms-userid';
    const RESIDENT_USER_KEY = 'res-userid';
    public static function __callStatic($method,$args){
        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }
        switch($method){
            case "start":
                return;
            case "unsetKey":
                if(isset($_SESSION[$args[0]])){
                    unset($_SESSION[$args[0]]);
                }
                return;
            case "isCmsUser":
                return self::get(Session::CMS_USER_KEY) !== null;
            case "cmsUserSet":
                return $_SESSION[Session::CMS_USER_KEY] = $args[0];
            case "residentUserSet":
                return $_SESSION[Session::RESIDENT_USER_KEY] = $args[0];
            case "residentUserUnset":
                if(isset($_SESSION[Session::RESIDENT_USER_KEY])){
                    unset($_SESSION[Session::RESIDENT_USER_KEY]);
                }
                return null;
            case "residentUserLoggedIn":
                return isset($_SESSION[Session::RESIDENT_USER_KEY]) && $_SESSION[Session::RESIDENT_USER_KEY] !== null;
            case "key":
                return $_SESSION[$args[0]] = $args[1];
            case "get":
                return isset($_SESSION[$args[0]]) ? $_SESSION[$args[0]] : null;
            case "stop":
                return session_write_close();
            default:
                //Throw base exception
            return;
        }
    }

    public static function unsetKey(string $key){
        if(isset($_SESSION[$key])){
            unset($_SESSION[$key]);
        }
    }
    public static function isCmsUser(){
        self::startIfNoSession();
        return self::get(Session::CMS_USER_KEY) !== null;   
    }

    public static function cmsUserSet(string $uid){
        self::startIfNoSession();
        self::key(Session::CMS_USER_KEY,$uid);
    }

    public static function key(string $key,$value){
        self::startIfNoSession();
        $_SESSION[$key] = $value;
    }

    public static function get(string $key){
        self::startIfNoSession();
        if(!isset($_SESSION[$key])){
            return null;
        }
        return $_SESSION[$key];
    }

    public static function stop(){
        session_write_close();
    }
}

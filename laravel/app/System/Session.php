<?php

namespace App\System;

use Illuminate\Database\Eloquent\Model;
use App\Util\Util;

class Session// extends Model
{
    //
    //protected $table ='contact';

    const USER_LOGIN_KEY = 'amc-userid';
    const CMS_USER_KEY = 'cms-userid';
    const RESIDENT_USER_KEY = 'res-userid';
    private static $dummy = [];

    public static function log(string $a){
        Util::log(Util::serverName() . "::" . $a,['log' => 'session']);
    }
    public static function __callStatic($method,$args){
        if(Util::isCommandLine())
            return self::cmdMock($method,$args);
        self::log("Call static session: $method(" . var_export($args,1) . ")");
        if(session_status() == PHP_SESSION_NONE){
            self::log("Starting session");
            session_start();
        }
        self::log("Session data: " . var_export($_SESSION,1));
        switch($method){
            case "log":
                self::log($args[0]);
                return;
            case "start":
                return;
            case "unsetKey":
                self::log("UNsetting key");
                if(isset($_SESSION[$args[0]])){
                    unset($_SESSION[$args[0]]);
                }
                return;
            case "isCmsUser":
                self::log("CMS_USERKEY: " . var_export(self::get(Session::CMS_USER_KEY),1));
                self::log(var_export(self::get(Session::CMS_USER_KEY) !== null,1));
                return self::get(Session::CMS_USER_KEY) !== null;
            case "cmsUserSet":
                return $_SESSION[Session::CMS_USER_KEY] = $args[0];
            case "residentUserSet":
                self::log("Resident center set to : " . var_export($args,1));
                return $_SESSION[Session::RESIDENT_USER_KEY] = $args[0];
            case "residentUserUnset":
                self::log("Resident user unset");
                if(isset($_SESSION[Session::RESIDENT_USER_KEY])){
                    unset($_SESSION[Session::RESIDENT_USER_KEY]);
                }
                return null;
            case "residentUserLoggedIn":
                self::log("RESIDENT_USER_LOGGED_IN");
                return isset($_SESSION[Session::RESIDENT_USER_KEY]) && $_SESSION[Session::RESIDENT_USER_KEY] !== null;
            case "key":
                return $_SESSION[$args[0]] = $args[1];
            case "get":
                self::log("GET: args:" . var_export($args[0],1));
                return isset($_SESSION[$args[0]]) ? $_SESSION[$args[0]] : null;
            case "stop":
                return session_write_close();
            default:
                //Throw base exception
                self::log("Unknown method for SESSION call static: " . $method . "|args: " . var_export($args,1),['log' => 'session']);
            return;
        }
    }

    public static function cmdMock($method,$args){
        if(isset(self::$resolveCmd))
            return call_user_func(self::$resolveCmd,[$method,$args]);
        if($method == 'residentUserSet')
            self::$dummy[self::RESIDENT_USER_KEY] = $args[1];
        if($method == 'set')
            self::$dummy[$args[0]] = $args[1];
        if($method == 'get')
            return isset(self::$dummy[$args[0]]) ? self::$dummy[$args[0]] : null;
        return [];
    }
}

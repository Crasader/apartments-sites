<?php

namespace App\Util;

use Redis;
use App\Property\Entity;
use App\Property\Site;
use Illuminate\Http\Request;
use App\Mailer;

class Util
{
    public static function common(string $type, $category)
    {
        $entity = app()->make('App\Property\Site')->getEntity();
        return $entity->getWebPublicCommon($category);
    }

    public static function isCommandLine()
    {
        if (php_sapi_name() == 'cli') {
            return true;
        } else {
            return false;
        }
    }

    public static function dd($item){
        $info = debug_backtrace( );
        $line = $info[0]['line'];
        $file = $info[0]['file'];
        dd(compact('line', 'file', 'item'));
    }
    public static function requestUri()
    {
        if (isset($_SERVER['REQUEST_URI'])) {
            return $_SERVER['REQUEST_URI'];
        } else {
            return request()->getRequestUri();
        }
    }


    public static function isDevDomain()
    {
        return preg_match("|^dev\.|", Util::serverName());
    }

    public static function updateIfExists(string $model, array $where, array $setToValue)
    {
        $foo = app()->make($model);
        $row = $foo->where($where)->get();
        if (count($row)) {
            $key = array_keys($setToValue);
            $row = $row->first();
            foreach ($setToValue as $key => $value) {
                $row->$key = $value;
            }
            $row->save();
            return true;
        }
        return false;
    }

    public static function die404($req=null, $exception=null)
    {
        if ($req) {
            //TODO: if preferences to log 404s...
        }
        if ($exception) {
            //TODO: if preferences to log exceptions
        }
        //self::log("404: " . var_export($req,1) . " EXCEPTION: " . var_export($exception,1));
        $site = app()->make('App\Property\Site');
        //TODO: route this stuff through site controller's population methods
        $site->getEntity()->loadLegacyProperty();
        echo view('layouts/' . $site->getEntity()->getTemplateName() . '/404', [
            'entity'=> $site->getEntity(),
            'fsid' => $site->getEntity()->getTemplateName(),
            'page' => '404'
            ]);
        die();
    }

    public static function dieGeneric($req=null, $exception=null)
    {
        $site = app()->make('App\Property\Site');
        $path = "";
        if ($req) {
            $path = $req->path();
        }
        self::log($message = "Generic error: Site:" . $site->getEntity()->property_name . ": Page: {$path}" .
            " Message:" . $exception->getMessage() . "::Code:" .  $exception->getCode() . ":File:" . $exception->getFile() . "::Line:" . $exception->getLine() . "::TraceAsString" .  var_export($exception->getTraceAsString(), 1));
        //TODO: route this stuff through site controller's population methods
        if (ENV("EMAIL_LOGS") == '1') {
            self::log('emailing....');
            try {
                Mailer::queueError('wmerfalen@gmail.com', $site->getEntity()->getLegacyProperty()->url . ": $path -- ERROR", $message, ['matt@marketapts.com']);
            } catch (Exception $e) {
                self::log("ERROR SENDING EMAIL: " . var_export($e, 1));
            }
        }
        $site->getEntity()->loadLegacyProperty();
        echo view('layouts/' . $site->getEntity()->getTemplateName() . '/404', [
            'errorGeneric' => 1,
            'entity'=> $site->getEntity(),
            'fsid' => $site->getEntity()->getTemplateName(),
            'page' => '404'
            ]);
        die();
    }


    public static function isHttp()
    {
        return strcmp("http", $_SERVER['REQUEST_SCHEME']) == 0;
    }

    public static function isFpm()
    {
        return strcmp(php_sapi_name(), env('FPM_NAME')) == 0;
    }

    public static function isPage(string $p)
    {
        return preg_match("|^/$p|", self::requestUri());
    }

    public static function baseUri($inReq, $default=null) : string
    {
        if ($inReq instanceof Request) {
            $req = $inReq->getRequestUri();
        } else {
            $req = $inReq;
        }
        if (preg_match("|^/([a-zA-Z0-9\-\.]+)|", $req, $matches)) {
            return $matches[1];
        } elseif ($default) {
            return $default;
        } else {
            return $req;
        }
    }

    public static function isJson(string $s)
    {
        json_decode($s);
        return (json_last_error() == JSON_ERROR_NONE);
    }
    public static function redisIsNew(string $section)
    {
        if (empty($time = Redis::get(self::redisKey($section) . "_updated"))) {
            return true;
        }
        $bool =  $time > Redis::get(self::redisKey($section) . "_created");
        return $bool;
    }
    public static function redisRefresh()
    {
        foreach (Redis::keys(self::redisKey("*")) as $i => $key) {
            Redis::del($key);
        }
    }

    public static function redisUpdate(string $foo, $bar)
    {
        self::redisSetCreated($foo, time());
        self::redisSetUpdated($foo, time());
        self::redisSet($foo, $bar);
    }

    public static function redisUpdateKeys(array $config)
    {
        //TODO !security this is potentially dangerous. Do this the right way
        $keys = shell_exec("redis-cli --raw keys '" . preg_replace("|[']*|", "", $config['like']) . "' | grep '_updated'");
        foreach (explode("\n", $keys) as $i => $line) {
            Redis::set($line, time());
        }
    }

    public static function redisSet(string $foo, $bar)
    {
        \Debugbar::info("Setting $foo to " . var_export($bar, 1));
        if (preg_match("|commute\-text|", $foo)) {
            $e = new \Exception;
            file_put_contents(storage_path() . "/logs/redisSet.log", date("Y-m-d H:i:s") . "::{$foo} being set to " . \
                var_export($bar, 1) . " BT: " . var_export($e->getTraceAsString(), 1) . "\n", FILE_APPEND);
        }
        if (is_array($bar)) {
            Redis:;
            set(self::redisKey($foo) . ':array:', '1');
            Redis::set(self::redisKey($foo), self::redisEncode($bar));
            return;
        }
        Redis::set(self::redisKey($foo), $bar);
    }

    public static function log(string $foo, $opts = null)
    {
        if (isset($opts['log'])) {
            $file = storage_path() . "/logs/log-" . $opts['log'] . ".log";
            if (!file_exists($file)) {
                shell_exec("touch $file");
                shell_exec("chmod 755 $file");
            }
        } else {
            $file = storage_path() . "/logs/log.log";
        }
        file_put_contents($file, date("Y-m-d H:i:s") . "::" . Util::serverName() . "::{$foo}\n", FILE_APPEND);
    }

    public static function serverName()
    {
        if (isset($_SERVER['SERVER_NAME'])) {
            return $_SERVER['SERVER_NAME'];
        } else {
            return 'no-server-set';
        }
    }

    /**
    * @param key string Key being called
    * @param callable function to fetch if data is new
    * @param arrayType json_decodes data if set to true
    * @return string|array the fetched value from redis or callable
    */
    public static function redisFetchOrUpdate(string $key, $callable, $arrayType=false)
    {
        if (env("REDIS_ALWAYS_FETCH") === '1') {
            \Debugbar::info("REDIS ALWAYS FETCH");
            $foo = $callable();
            self::redisUpdate($key, is_array($foo) ? self::redisEncode($foo) : $foo);
            return $foo;
        }
        \Debugbar::info("Redis fetch or update: $key");
        if (!self::redisIsNew($key)) {
            if ($arrayType) {
                return self::redisDecode(self::redisGet($key));
            } else {
                return self::redisGet($key);
            }
        } else {
            $foo = $callable();
            self::redisUpdate($key, is_array($foo) ? self::redisEncode($foo) : $foo);
            return $foo;
        }
    }

    public static function redisGet(string $foo, $decorate = true)
    {
        \Debugbar::info("REDIS_GET: $foo");
        if (Redis::get(self::redisKey($foo, $decorate) . ':array:') == '1') {
            return self::redisDecode(Redis::get(self::redisKey($foo, $decorate)));
        }
        return Redis::get(self::redisKey($foo, $decorate));
    }

    public static function redisDeleteRawKey(string $key)
    {
        Redis::del($key);
        Redis::del($key . "_updated");
        Redis::del($key . "_created");
    }

    public static function redisSetCreated(string $foo, $time)
    {
        Redis::set(self::redisKey($foo) . "_created", $time);
    }

    public static function redisSetUpdated(string $section)
    {
        Redis::set(self::redisKey($section) . "_updated", time());
    }

    public static function redisKey(string $foo, $decorate=true)
    {
        if (Site::$instance === null) {
            $site = app()->make("App\Property\Site");
        } else {
            $site = Site::$instance;
        }
        if ($decorate) {
            if ($site->redis_alias !== null) {
                return Site::$instance->redis_alias . ':' . $foo;
            }
            return str_replace("www.", "", Util::serverName()) . ":$foo";
        } else {
            return $foo;
        }
    }

    public static function redisEncode($object)
    {
        return json_encode($object);
    }

    public static function redisDecode($str, $opts=true)
    {
        return json_decode($str, $opts);
    }

    public static function redisGlobalKey(string $key)
    {
        return "global_$key";
    }

    public static function isDev()
    {
        return strcmp(ENV('DEV'), '1') == 0;
    }

    public static function transformFloorplanName(string $name)
    {
        return preg_replace("|[^a-z0-9]+|", "", strtolower($name));
    }

    public static function isResidentPortal()
    {
        return preg_match("|^/resident\-portal/,*|", self::requestUri());
    }

    public static function depluralize(string $s)
    {
        return preg_replace("|[sS]{1}$|", "", $s);
    }

    public static function isHome()
    {
        return (
            preg_match("|^/index|", self::requestUri()) ||
            preg_match("|^/home|", self::requestUri()) ||
            self::requestUri() == '/' ||
            strlen(self::requestUri()) == 0
        );
    }

    public static function formatRentPrice(string $price)
    {
        return round($price, 2, PHP_ROUND_HALF_UP);
    }

    public static function emailRegex()
    {
        return '^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$';
    }
}

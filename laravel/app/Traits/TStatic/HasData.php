<?php
namespace App\Traits\TStatic;

trait HasData
{
    protected static $hasData = [];

    public static function has($key)
    {
        return in_array($key, array_keys(self::$hasData));
    }

    public static function get($data)
    {
        if (isset(self::$hasData[$data])) {
            return self::$hasData[$data];
        }
        return null;
    }

    public static function set($key, $value)
    {
        self::$hasData[$key] = $value;
    }
}

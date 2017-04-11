<?php

namespace App\AIM;

use Illuminate\Database\Eloquent\Model;

class DatabaseChanger extends Model
{
    //
    public static function changeDb(string $dbName){
		//TODO: this is really ugly and probably very inefficient. I DON'T LIKE IT DX
        \Config::set($dbName, [
            'driver' => 'sqlsrv',
            'host' => env('AIM_SQL_HOST','192.168.1.139'),
            'port' => env('AIM_SQL_PORT','1433'),
            'database' => 'AIM_' . strtoupper(\App\Property\Site::$instance->getEntity()->getLegacyProperty()->code),
            'username' => env('AIM_USERNAME'),
            'password' => env('AIM_PASSWORD'),
            'prefix' => '',
        ]);
    }
}

<?php

namespace App\Property\Crud;

use Illuminate\Database\Eloquent\Model;

class SecurityCheck extends Model
{
    //
    public function allowed()
    {
        if (php_sapi_name() == 'apache2handler') {
            return $_SERVER['SERVER_NAME'] == env('ALLOWED_CRUD_SERVER');
        }
        return false;
    }
}

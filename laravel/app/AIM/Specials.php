<?php

namespace App\AIM;

use Illuminate\Database\Eloquent\Model;

class Specials extends Model
{
    //
    protected $connection = 'sqlsrv';
    protected $_procedures = [
        'specials' => 'WS_SP_MAPTS_GET_WEBSITE_SPECIALS',
    ];

    public function __construct(){
        $this->connection = env('AIM_CONNECTION');
    }
    public function getSpecials(){
        return \DB::connection($this->connection)->select($this->_procedures['specials']);
    }

}

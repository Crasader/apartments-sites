<?php

namespace App\AIM;

use Illuminate\Database\Eloquent\Model;
use App\AIM\DatabaseChanger;

class Specials extends Model
{
    //
    protected $connection = 'sqlsrv';
    protected $_procedures = [
        'specials' => 'WS_SP_MAPTS_GET_WEBSITE_SPECIALS',
    ];

    public function __construct()
    {
        DatabaseChanger::changeDb('database.connections.dynamic');
        $this->connection = 'dynamic';
    }
    public function getSpecials()
    {
        try {
            return \DB::connection($this->connection)->select($this->_procedures['specials']);
        } catch (Exception $e) {
            return [];
        }
    }
}

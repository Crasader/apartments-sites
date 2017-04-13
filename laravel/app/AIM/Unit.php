<?php

namespace App\AIM;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    //
    protected $connection = 'sqlsrv';
    protected $_procedures = [
        'units' => 'WS_SP_MAPTS_GET_UNIT_AVAILABILITY_DETAIL_BY_SQFT_NO_XML', 
    ];

    public function __construct(){
        DatabaseChanger::changeDb('database.connections.dynamic');
        $this->connection = 'dynamic';
    }
    public function getAllByType(string $type){
        $cleanedType = preg_replace('|[^a-zA-Z0-9 ]{1,}|','',$type);
        \Debugbar::info("Cleaned unit type name:" . var_export($cleanedType,1));
        $rows = \DB::connection($this->connection)->select($foo = $this->_procedures['units'] . " '{$cleanedType}'");
        \Debugbar::info("ran sql: $foo");
        return $rows;
    }

}

<?php

namespace App\AIM;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    //
    protected $connection = 'sqlsrv';
    protected $_procedures = [
        'units' => 'WS_SP_MAPTS_GET_UNIT_AVAILABILITY_DETAIL_BY_SQFT_NO_XML',   //WS_SP_MAPTS_GET_UNIT_AVAILABILITY_NOXML',
    ];

    public function __construct(){
        $this->connection = env('AIM_CONNECTION');
    }
    public function getAllByType(string $type){
        $cleanedType = preg_replace('|[^a-zA-Z0-9 ]{1,}|','',$type);
        $rows = \DB::connection($this->connection)->select($this->_procedures['units'] . " '{$cleanedType}'");
        return $rows;
    }

}

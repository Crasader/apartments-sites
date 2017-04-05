<?php

namespace App\AIM;

use Illuminate\Database\Eloquent\Model;

class FloorPlans extends Model
{
    //
    protected $connection = 'sqlsrv';
    protected $_procedures = [
        'floor-plans' => 'WS_SP_MAPTS_GET_UNIT_AVAILABILITY_NOXML',
    ];

    public function __construct(){
        $this->connection = env('AIM_CONNECTION');
    }
    public function getFloorPlans(){
        return \DB::connection($this->connection)->select($this->_procedures['floor-plans']);
    }

}

<?php

namespace App\AIM;

use Illuminate\Database\Eloquent\Model;
use App\AIM\DatabaseChanger;

class FloorPlans extends Model
{
    //
    protected $connection = 'sqlsrv';
    protected $_procedures = [
        'floor-plans' => 'WS_SP_MAPTS_GET_UNIT_AVAILABILITY_NOXML',
    ];

    //TODO: create a service provider that will give this object the correct connection type
    public function __construct(){
        DatabaseChanger::changeDb('database.connections.dynamic');
		$this->connection = 'dynamic';
    }
    public function getFloorPlans(){
        return \DB::connection($this->connection)->select($this->_procedures['floor-plans']);
    }

}

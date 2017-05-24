<?php
namespace App\Util\Html\Input;

use App\Util\Html\Input\Base;

class Hidden extends Base
{
    protected $_requiredAttributes = [
        'type' => 'hidden'
    ];
    public function __construct()
    {
        parent::__construct("input");
    }
}

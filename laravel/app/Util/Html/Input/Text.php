<?php
namespace App\Util\Html\Input;

use App\Util\Html\Input\Base;

class Text extends Base
{
    protected $_requiredAttributes = [
        'type' => 'text'
    ];
    public function __construct()
    {
        parent::__construct("input");
    }
}

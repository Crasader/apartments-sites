<?php

namespace App\Exceptions;

class LogicException extends BaseException
{
    protected $_logFilePath = '';
    public function __construct()
    {
        parent::__construct();
    }
}

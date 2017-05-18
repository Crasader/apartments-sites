<?php

namespace App\Exceptions;

class BaseException extends \Exception
{
    protected $_logFilePath = '';
    public function __construct()
    {
        $this->_logFilePath = realpath(storage_path() . '/' . ENV('EXCEPTION_LOG') . '_' . date("Y-m-d") . ".log");
    }
    public function log(string $class)
    {
        if (!file_exists($this->_logFilePath)) {
            touch($this->_logFilePath);
        }
        file_put_contents($this->_logFilePath,
            date("Y-m-d H:i:s") . ": [{$class}->{$this->getLine()}]: {$this->getMessage()}\n",
            FILE_APPEND
        );
    }
}

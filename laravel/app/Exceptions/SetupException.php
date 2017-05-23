<?php

namespace App\Exceptions;

use App\Exceptions\BaseException;

class SetupException extends BaseException
{
    public function __construct()
    {
        if (ENV('LOG_FILE_EXCEPTIONS') == 'true') {
            parent::log(ParameterException::class);
        }
    }
}

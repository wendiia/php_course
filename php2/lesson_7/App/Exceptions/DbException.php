<?php

namespace App\Exceptions;

use App\Services\Logger;
use Exception;

class DbException extends Exception
{
    public function __construct($e = null)
    {
        $logger = new Logger();
        $logger->emergency('Критическая ошибка БД', ['exception' => $e]);
    }
}

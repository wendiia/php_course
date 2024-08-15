<?php

namespace App\Exceptions;

use App\Services\Logger;
use Exception;

class Http404Exception extends Exception
{
    public function __construct($e = null)
    {
        $logger = new Logger();
        $logger->error('Данная страница не найдена', ['exception' => $e]);
    }
}

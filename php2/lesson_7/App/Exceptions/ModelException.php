<?php

namespace App\Exceptions;

use App\Traits\PropertiesStorageTrait;
use Exception;

class ModelException extends Exception
{
    use PropertiesStorageTrait;

    public function getErrors(): ?array
    {
        return $this->data ?? null;
    }
}
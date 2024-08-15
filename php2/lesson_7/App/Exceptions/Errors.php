<?php

namespace App\Exceptions;

use Exception;

class Errors extends Exception
{
    protected array $errors = [];

    public function addError(\Throwable $error): void
    {
        $this->errors[] = $error;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}
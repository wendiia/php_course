<?php

namespace App\Exceptions;

use Exception;

class Errors extends Exception
{
    protected array $errors = [];

    public function addError(\Throwable $error, string $key = ''): void
    {
        $this->errors[$key] = $error;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}
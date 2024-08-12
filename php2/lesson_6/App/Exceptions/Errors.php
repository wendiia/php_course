<?php

namespace App\Exceptions;

use Exception;

class Errors extends Exception
{
    protected array $errors = [];

    public function addError(string $name, \Throwable $error): void
    {
        $this->errors[$name][] = $error;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}
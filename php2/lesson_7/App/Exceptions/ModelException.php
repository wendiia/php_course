<?php

namespace App\Exceptions;

use Exception;

class ModelException extends Exception
{
    protected array $data;

    public function addError(string $key, array $value): void
    {
        $this->data[$key] = $value;
    }

    public function getErrors(): ?array
    {
        return $this->data ?? null;
    }
}

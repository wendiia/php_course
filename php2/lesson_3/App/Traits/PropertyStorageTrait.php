<?php

namespace App\Traits;

trait PropertyStorageTrait
{
    protected array $data;

    public function __set($key, $value): void
    {
        $this->data[$key] = $value;
    }

    public function __get($key)
    {
        return $this->data[$key];
    }

    public function __isset(string $name): bool
    {
        return isset($this->data[$name]);
    }
}

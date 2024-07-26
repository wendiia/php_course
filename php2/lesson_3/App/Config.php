<?php

namespace App;

class Config
{
    public array $data;
    protected static Config $objConfig;

    protected function __construct()
    {
        $this->data = require __DIR__ . '/../data/config.php';
    }

    public static function init(): Config
    {
        if (!isset(self::$objConfig)) {
            self::$objConfig = new Config();
        }

        return self::$objConfig;
    }
}

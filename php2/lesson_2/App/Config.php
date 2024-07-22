<?php

namespace App;

class Config
{
    protected string $configPath = __DIR__ . '/../data/config.txt';
    public array $data;
    protected static Config $objConfig;

    protected function __construct()
    {
        $dataRaw = file($this->configPath);

        foreach ($dataRaw as $data) {
            $data_explode = explode('=', $data);
            $this->data['db'][$data_explode[0]] = trim($data_explode[1]);
        }
    }

    public static function init(): Config
    {
        if (!isset(self::$objConfig)) {
            self::$objConfig = new Config();
        }

        return self::$objConfig;
    }
}

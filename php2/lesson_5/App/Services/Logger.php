<?php

namespace App\Services;

class Logger
{
    protected static string $filePath = __DIR__ . '/../../data/log.txt';

    public static function log(\Throwable $error): void
    {
        date_default_timezone_set('Europe/Moscow');

        $errorRecord = implode('   ', [
            date("Y.m.d H:i"),
            $error->getFile(),
            'Line: ' . $error->getLine(),
            $error->getMessage()
        ]);

        file_put_contents(self::$filePath, $errorRecord . PHP_EOL, FILE_APPEND);
    }
}

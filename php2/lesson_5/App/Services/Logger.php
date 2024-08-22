<?php

namespace App\Services;

class Logger
{
    public static function log(\Throwable $error): void
    {
        $errorRecord = implode('   ', [
            date("Y.m.d H:i"),
            $error->getFile(),
            'Line: ' . $error->getLine(),
            $error->getMessage()
        ]);

        file_put_contents(__DIR__ . '/../../data/log.txt', $errorRecord . PHP_EOL, FILE_APPEND);
    }
}

<?php

namespace App\Services;

use Psr\Log\LoggerInterface;
use Psr\Log\LoggerTrait;

class Logger implements LoggerInterface
{
    use LoggerTrait;

    public function log($level, string|\Stringable $message, array $context = []): void
    {
        date_default_timezone_set('Europe/Moscow');

        $errorRecord = implode('   ', [
                date("Y.m.d H:i"),
                $level,
                $message,
                $context['exception']->getFile(),
                'Line: ' . $context['exception']->getLine(),
                $context['exception']->getMessage()
        ]);

        file_put_contents(__DIR__ . '/../../data/log.txt', $errorRecord . PHP_EOL, FILE_APPEND);
    }
}

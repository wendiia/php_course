<?php

require __DIR__ . '/autoload.php';

use App\Exceptions\DbException;
use App\Exceptions\Http403Exception;
use App\Exceptions\Http404Exception;
use App\Router;
use App\Services\Logger;
use App\View;

session_start();

$prefixes = ['admin'];
$url = $_SERVER['REQUEST_URI'];
$view = new View();
$logger = new Logger();

try {
    foreach ($prefixes as $prefix) {
        if (str_contains($url, $prefix)) {
            Router::get($prefix);
            return;
        }
    }
    Router::get();
} catch (Http404Exception $exception) {
    $logger->error('Данная страница не найдена', ['exception' => $exception]);
    http_response_code(404);
    $view->display(__DIR__ . '/App/Templates/notFound.php');
} catch (Http403Exception $exception) {
    http_response_code(403);
    $view->display(__DIR__ . '/App/Templates/forbidden.php');
} catch (\Throwable $exception) {
    if (DbException::class === get_class($exception)) {
        $logger->emergency('Критическая ошибка БД', ['exception' => $exception]);
    }

    $view->exception = $exception;
    $view->display(__DIR__ . '/App/Templates/exception.php');
}

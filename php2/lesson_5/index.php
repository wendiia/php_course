<?php

use App\Exceptions\Http403Exception;
use App\Exceptions\Http404Exception;
use App\Exceptions\DbException;
use App\View;

require __DIR__ . '/autoload.php';

session_start();

$view = new View();
$act = 'All';
$class = 'App\\Controllers\\Index';

$urlWithoutGet = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$urlOnlyText = str_replace('/', '', $urlWithoutGet);

if ('admin' === $urlOnlyText) {
    $class = 'App\\Controllers\\Admin\\Index';
} elseif (!empty($urlOnlyText)) {
    $urlParts = explode('/', $urlWithoutGet);
    $act = array_pop($urlParts);
    $class = 'App\\Controllers' . implode('\\', $urlParts);
}

try {
    $ctrl = new $class();
    $ctrl->action($act);
} catch (Http404Exception $exception) {
    http_response_code(404);
    $view->display(__DIR__ . '/App/Templates/notFound.php');
} catch (Http403Exception $exception) {
    http_response_code(403);
    $view->display(__DIR__ . '/App/Templates/forbidden.php');
} catch (DbException $exception) {
    $view->exception = $exception;
    $view->display(__DIR__ . '/App/Templates/dbException.php');
} catch (\Throwable $exception) {
    $view->exception = $exception;
    $view->display(__DIR__ . '/App/Templates/exception.php');
}

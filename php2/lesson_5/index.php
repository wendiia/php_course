<?php

use App\Exceptions\Http403Exception;
use App\Exceptions\Http404Exception;
use \App\Exceptions\DbException;
use App\View;

require __DIR__ . '/autoload.php';

session_start();

$classNamePart = 'App\\Controllers\\';
$url = substr($_SERVER['REQUEST_URI'], 1);
$checkAdmin = str_contains($url, 'admin');

if (true === $checkAdmin) {
    $url = substr($url, 6);
    $classNamePart .= 'Admin\\';
}

$urlWithoutGet = parse_url($url, PHP_URL_PATH);
$urlParts = explode('/', $urlWithoutGet);
$lastUrlPart = array_pop($urlParts);
$urlWithoutAct = implode('\\', $urlParts);
$act = $lastUrlPart ?: 'All';
$controller = $urlWithoutAct ?: 'Index';
$class = $classNamePart . $controller;

$view = new View();

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

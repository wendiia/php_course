<?php

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

$ctrl = new $class();
$ctrl->action($act);

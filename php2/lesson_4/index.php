<?php

require __DIR__ . '/autoload.php';

session_start();

$url = substr($_SERVER['REQUEST_URI'], 1);
$checkAdmin = str_contains($url, 'admin');

if (true === $checkAdmin) {
    $url = substr($url, 6);
}

$urlWithoutGet = parse_url($url, PHP_URL_PATH);
$urlParts = explode('/', $urlWithoutGet);
$lastUrlPart = end($urlParts);
$act = $lastUrlPart ?: 'All';
$urlWithoutAct = str_replace('/' . $act, '', $urlWithoutGet);
$controller = $urlWithoutAct ?: 'Index';
$controller = str_replace('/', '\\', $controller);

if (true === $checkAdmin) {
    $class = 'App\\Controllers\\Admin\\' . $controller;
} else {
    $class = 'App\\Controllers\\' . $controller;
}

$ctrl = new $class();
$ctrl->action($act);

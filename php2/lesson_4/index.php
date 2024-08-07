<?php

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

$ctrl = new $class();
$ctrl->action($act);

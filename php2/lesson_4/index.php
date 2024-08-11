<?php

require __DIR__ . '/autoload.php';

use App\Router;

session_start();

$prefixes = ['admin'];
$url = $_SERVER['REQUEST_URI'];

foreach ($prefixes as $prefix) {
    if (str_contains($url, $prefix)) {
        Router::get($prefix);
        return;
    }
}

Router::get();

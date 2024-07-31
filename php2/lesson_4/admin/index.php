<?php

require __DIR__ . '/../autoload.php';

$action = $_GET['act'] ?? 'Default';
$controllerName = $_GET['ctrl'] ?? 'Index';
$class = 'App\\Controllers\\' . $controllerName;

$controller = new $class();
$controller->action($action);

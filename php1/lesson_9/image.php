<?php

use App\View;
use App\Authentication;

session_start();
include __DIR__ . '/autoload.php';

$images = scandir(__DIR__ . '/images');
$pathTemplate = __DIR__ . '/templates/image.php';

$view = new View();
$view->assign('images', $images);
$view->assign('user', Authentication::getCurrentUser());
$view->display($pathTemplate);

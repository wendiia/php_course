<?php

session_start();
include __DIR__ . '/classes/View.php';
include __DIR__ . '/classes/Authentication.php';

$images = scandir(__DIR__ . '/images');
$pathTemplate = __DIR__ . '/templates/image.php';

$view = new View();
$view->assign('images', $images);
$view->assign('user', Authentication::getCurrentUser());
$view->display($pathTemplate);

<?php

session_start();
include __DIR__ . '/classes/View.php';
include __DIR__ . '/classes/Authentication.php';

$images = scandir(__DIR__ . '/images');
$pathTemplate = __DIR__ . '/templates/gallery.php';
$auth = new Authentication();

$view = new View();
$view->assign('images', $images);
$view->assign('user', $auth->getCurrentUser());
$view->display($pathTemplate);

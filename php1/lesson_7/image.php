<?php

session_start();
include __DIR__ . '/classes/View.php';
include __DIR__ . '/classes/Authentication.php';

$images = scandir(__DIR__ . '/images');
$pathTemplate = __DIR__ . '/templates/image.php';
$image = !empty($images[$_GET['id']]) ? $images[$_GET['id']] : null;
$auth = new Authentication();
$view = new View();

$view->assign('id', $_GET['id']);
$view->assign('image', $image);
$view->assign('user', $auth->getCurrentUser());
$view->display($pathTemplate);

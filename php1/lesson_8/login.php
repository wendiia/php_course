<?php

session_start();
include __DIR__ . '/classes/View.php';
include __DIR__ . '/classes/Authentication.php';

$pathTemplate = __DIR__ . '/templates/login.php';
$checkAuth = null;
$auth = new Authentication();

if (null !== $auth->getCurrentUser()) {
    header('Location: index.php');
}

$view = new View();

if (!empty($_POST['login']) && !empty($_POST['password'])) {
    $checkAuth = $auth->checkPassword($_POST['login'], $_POST['password']);
    $view->assign('checkAuth', $checkAuth);
    $view->assign('login', $_POST['login']);
    $view->assign('password', $_POST['password']);
}

$view->assign('user', $auth->getCurrentUser());
$view->display($pathTemplate);

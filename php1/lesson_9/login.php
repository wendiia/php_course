<?php

session_start();

require __DIR__ . '/autoload.php';

use App\Services\Authentication;
use App\View;

if (!empty($_SESSION['login'])) {
    header('Location: /gallery.php');
    exit();
}

$template = __DIR__ . '/templates/login.php';
$auth = new Authentication();
$view = new View();

if (
    !empty($_POST['login']) &&
    !empty($_POST['password'])
) {
    $checkAuth = $auth->checkLoginPasswordAndAuth($_POST['login'], $_POST['password']);
    $view->assign('login', $_POST['login']);
    $view->assign('checkAuth', $checkAuth);
}

$view->display($template);

<?php

session_start();
include __DIR__ . '/classes/View.php';
include __DIR__ . '/classes/Authentication.php';

$pathTemplate = __DIR__ . '/templates/login.php';
$exAuthentication = new Authentication();

if (null !== Authentication::getCurrentUser()) {
    header('Location: index.php');
}

$view = new View();
$view->assign('exAuthentication', $exAuthentication);
$view->assign('user', Authentication::getCurrentUser());
$view->display($pathTemplate);

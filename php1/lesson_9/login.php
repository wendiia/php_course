<?php

use App\View;
use App\Authentication;

session_start();
include __DIR__ . '/autoload.php';

$pathTemplate = __DIR__ . '/templates/login.php';
$exAuthentication = new Authentication();

if (null !== Authentication::getCurrentUser()) {
    header('Location: index.php');
}

$view = new View();
$view->assign('exAuthentication', $exAuthentication);
$view->assign('user', Authentication::getCurrentUser());
$view->display($pathTemplate);

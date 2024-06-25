<?php

session_start();
include __DIR__ . '/classes/View.php';
include __DIR__ . '/classes/News.php';
include __DIR__ . '/classes/Authentication.php';

$pathTemplate = __DIR__ . '/templates/news.php';
$pathFileNews = __DIR__ . '/data/news.txt';
$news = new News($pathFileNews);
$auth = new Authentication();
$view = new View();
$view->assign('news', $news->getAllNews());
$view->assign('user', $auth->getCurrentUser());
echo $view->render($pathTemplate);

<?php
session_start();
include __DIR__ . '/classes/View.php';
include __DIR__ . '/classes/News.php';
include __DIR__ . '/classes/Authentication.php';

$pathTemplate = __DIR__ . '/templates/news.php';
$pathFileNews = __DIR__ . '/data/news.txt';
$news = new News($pathFileNews);
$view = new View();

$view->assign('news', $news->getAllNews());
$view->assign('user', Authentication::getCurrentUser());
echo $view->render($pathTemplate);

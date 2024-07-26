<?php

require __DIR__ . '/autoload.php';

use App\Models\Article;
use App\View;

$template = __DIR__ . '/templates/index.php';
$news = Article::findAll();
$view = new View($template);
$view->assign('news', $news);
$view->display();

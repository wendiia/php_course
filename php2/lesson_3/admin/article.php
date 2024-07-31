<?php

require __DIR__ . '/../autoload.php';

use App\Models\Article;
use App\View;

$template = __DIR__ . '/templates/article.php';
$article = Article::findById($_GET['id']);

if (false === $article) {
    http_response_code(404);
    header('Location: /templates/notFound.php');
    exit();
}

$view = new View();
$view->article = $article;
$view->display($template);

<?php

require __DIR__ . '/autoload.php';

use App\Models\Article;

$article = Article::findById($_GET['id']);

if (false === $article) {
    http_response_code(404);
    header('Location: /templates/notFound.php');
    exit();
}

require __DIR__ . '/templates/article.php';

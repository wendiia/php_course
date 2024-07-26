<?php

require __DIR__ . '/../autoload.php';

use App\Models\Article;

if (!empty($_GET['id'])) {
    $article = Article::findById($_GET['id']);

    if (false === $article) {
        http_response_code(404);
        header('Location: /templates/notFound.php');
        exit();
    }

    $article->delete();
}

header('Location: /index.php');
exit();

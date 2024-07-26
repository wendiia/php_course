<?php

require __DIR__ . '/autoload.php';

use App\Models\Article;

if (!empty($_GET['id'])) {
    $article = Article::findById($_GET['id']);
    $article->delete();
}

header('Location: /index.php');
exit();

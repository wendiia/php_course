<?php

use App\Models\News;
use App\Models\Article;
use App\Authentication;

session_start();
include __DIR__ . '/autoload.php';

if (
    !empty(trim($_POST['title'])) &&
    !empty(trim($_POST['content'])) &&
    null !== Authentication::getCurrentUser()
) {
    $news = new News();
    $article = new Article(Authentication::getCurrentUser(), $_POST['title'], $_POST['content']);
    var_dump($news->append($article));
}

header('Location: /index.php');
exit;

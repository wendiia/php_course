<?php

session_start();
include __DIR__ . '/classes/News.php';
include __DIR__ . '/classes/Authentication.php';

if (
    !empty(trim($_POST['title'])) &&
    !empty(trim($_POST['content'])) &&
    null !== Authentication::getCurrentUser()
) {
    $news = new News();
    $article = new Article(Authentication::getCurrentUser(), $_POST['title'], $_POST['content']);
    $news->append($article);
}

header('Location: /index.php');
exit;

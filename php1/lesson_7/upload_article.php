<?php

session_start();
include __DIR__ . '/classes/News.php';
include __DIR__ . '/classes/Authentication.php';
$pathFileNews = __DIR__ . '/data/news.txt';

if (
    !empty(trim($_POST['title'])) &&
    !empty(trim($_POST['content'])) &&
    null !== Authentication::getCurrentUser()
) {
    $news = new News($pathFileNews);
    $article = new Article(Authentication::getCurrentUser(), $_POST['title'], $_POST['content']);
    $news->append($article)->save();
}

header('Location: /news.php');
exit;

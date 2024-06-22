<?php
session_start();
include __DIR__ . '/classes/View.php';
include __DIR__ . '/classes/GuestBook.php';
include __DIR__ . '/classes/Authentication.php';

$pathTemplate = __DIR__ . '/templates/index.php';
$pathFileRecords = __DIR__ . '/data/records.txt';
$bookRecords = new GuestBook($pathFileRecords);

$view = new View();
$view->assign('records', $bookRecords->getData());
$view->assign('user', Authentication::getCurrentUser());
echo $view->render($pathTemplate);

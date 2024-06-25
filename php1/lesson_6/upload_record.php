<?php

include __DIR__ . "/GuestBook.php";

$path = __DIR__ . '/records.txt';

if (!empty($_POST['record'])) {
    $exGuestBook = new GuestBook($path);
    $exGuestBook->append($_POST['record'])->save();
}

header('Location: /index.php');
exit;

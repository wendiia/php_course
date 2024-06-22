<?php

include __DIR__ . '/classes/GuestBook.php';
include __DIR__ . '/classes/GuestBookRecord.php.php';
$pathFileRecords = __DIR__ . '/data/records.txt';

if (!empty($_POST['record'])) {
    $exGuestBook = new GuestBook($pathFileRecords);
    $record = new GuestBookRecord($_POST['record']);
    $exGuestBook->append($record)->save();
}

header('Location: /index.php');
exit;

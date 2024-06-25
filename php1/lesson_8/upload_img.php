<?php

include __DIR__ . '/classes/Uploader.php';

$exUploader = new Uploader('img');
$exUploader->uploadImg();

header('Location: /gallery.php');
exit;

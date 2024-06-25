<?php

include __DIR__ . '/classes/Uploader.php';

$exUploader = new Uploader('img');
$exUploader->upload();

header('Location: /gallery.php');
exit;

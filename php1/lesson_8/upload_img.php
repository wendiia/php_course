<?php

include __DIR__ . '/classes/ImgUploader.php';

$exUploader = new ImgUploader('img');
$exUploader->upload();

header('Location: /gallery.php');
exit;

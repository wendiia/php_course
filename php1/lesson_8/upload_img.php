<?php

include __DIR__ . '/classes/ImgUploader.php';

$exUploader = new Uploader('img');
$exUploader->upload();

header('Location: /gallery.php');
exit;

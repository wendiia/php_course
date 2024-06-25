<?php

use App\ImgUploader;

include __DIR__ . '/autoload.php';

$exUploader = new ImgUploader('img');
$exUploader->upload();

header('Location: /gallery.php');
exit;

<?php

include __DIR__ . "/Uploader.php";

$exUploader = new ImgUploader('img');
$exUploader->upload();

header('Location: /gallery.php');
exit;

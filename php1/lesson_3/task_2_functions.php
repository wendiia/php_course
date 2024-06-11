<?php
$images = scandir(__DIR__ . '/images');
unset($images[0], $images[1]);

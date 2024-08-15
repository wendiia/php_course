<?php

require __DIR__ . '/../../vendor/autoload.php';


spl_autoload_register(function ($class) {
    $file = __DIR__ . '/App/' . str_replace('\\', '/', substr($class, 4)) . '.php';

    if (file_exists($file)) {
        require_once $file;
    }
});

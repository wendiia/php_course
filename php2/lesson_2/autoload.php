<?php

spl_autoload_register(function ($class) {
    require
        __DIR__ . '/App/' .
        str_replace('\\', '/', substr($class, 4)) .
        '.php';
});

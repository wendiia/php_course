<?php

if ($_COOKIE) {
    var_dump($_COOKIE);
} else {
    setcookie('my_cookie', 'test', 0, '/');
}

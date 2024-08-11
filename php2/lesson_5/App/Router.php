<?php

namespace App;

class Router
{
    public static function get(string $prefix = ''): void
    {
        $url = substr($_SERVER['REQUEST_URI'], strlen($prefix) + 1);
        $path = parse_url($url, PHP_URL_PATH);
        $urlParts = explode('/', $path);

        if (empty($urlParts[0])) {
            array_shift($urlParts);
        }

        $lastUrlPart = array_pop($urlParts);
        $urlWithoutAction = implode('\\', $urlParts);
        $action = $lastUrlPart ?: 'All';
        $controller = $urlWithoutAction ?: 'Index';

        if (!empty($prefix)) {
            $controller = $prefix . '\\' . $controller;
        }

        $class = 'App\\Controllers\\' . $controller;

        if (!class_exists($class)) {
            $view = new View();
            http_response_code(404);
            $view->display(__DIR__ . '/Templates/notFound.php');
            exit();
        }

        $ctrl = new $class();
        $ctrl->action($action);
    }
}

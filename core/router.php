<?php
$routes = require_once('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

function abort(string $error)
{
    http_response_code($error);
    require_once(__DIR__ . '/../views/' . $error . '.php');
    die();
}

function routeController(string $uri, array $routes)
{
    if (array_key_exists($uri, $routes)) {
        require_once($routes[$uri]);
    } else {
        abort(Response::NOT_FOUND);
    }
}


routeController($uri, $routes);
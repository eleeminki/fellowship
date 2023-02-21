<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];


$routes = [
    '/fellowship/' => 'controllers/home.php',
    '/fellowship/login' => 'controllers/login.php',
    '/fellowship/markets' => 'controllers/markets.php',
    '/fellowship/market' => 'controllers/market.php',
    '404' => 'views/404.php'
];

function abort(array $routes)
{
    http_response_code(404);
    require_once($routes['404']);
    die();
}

function routeController(string $uri, array $routes)
{
    if (array_key_exists($uri, $routes)) {
        require_once($routes[$uri]);
    } else {
        abort($routes);
    }
}


routeController($uri, $routes);
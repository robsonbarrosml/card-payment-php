<?php

require __DIR__  . '/vendor/autoload.php';

$path = $_SERVER['REQUEST_URI'];
$routes = require __DIR__ . '/src/config/routes.php';

//Verify valid route
if (!array_key_exists($path, $routes)) {
    http_response_code(404);
    echo '404 Not Found';
    exit();
} else {
   require $routes[$path];
   exit();
}
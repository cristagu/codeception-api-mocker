<?php

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use WebServer\Router;
use WebServer\WebServer;

if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
    require_once __DIR__ . '/../vendor/autoload.php';
} 

$router = new Router(getenv(WebServer::ROUTES_FILE));

$response = $router->handle(Request::createFromGlobals());
$response->send();


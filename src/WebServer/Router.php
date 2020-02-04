<?php

namespace WebServer;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Router
{
    /** @var array */
    private $routes = [];

    public function __construct(string $routesFile)
    {
        $this->routes = unserialize(file_get_contents($routesFile));
    }

    public function handle(Request $request): Response
    {
        if (!array_key_exists($request->getPathInfo(), $this->routes)) {
            return new JsonResponse(["error" => "route not found"]);
        }

        return $this->routes[$request->getPathInfo()];
    }
}

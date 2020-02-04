<?php

namespace Codeception\Module;

use Codeception\Lib\ModuleContainer;
use Codeception\Module;
use Symfony\Component\HttpFoundation\Response;
use WebServer\WebServer;

class ApiMocker extends Module
{
    const CONFIG_PORT = 'port';
    const CONFIG_DEFAULT_PORT = 8080;

    /** @var WebServer */
    private $server;

    public function __construct(ModuleContainer $moduleContainer, array $config = [])
    {
        parent::__construct($moduleContainer, $config);

        $this->server = new WebServer($config[self::CONFIG_PORT] ?? self::CONFIG_DEFAULT_PORT);
    }

    public function mock(string $path, Response $response)
    {
        if (file_exists($this->server->routesFile)) {
            $currentRoutes = unserialize(file_get_contents($this->server->routesFile));
        } else {
            $currentRoutes = [];
        }

        $currentRoutes[$path] = $response;

        file_put_contents($this->server->routesFile, serialize($currentRoutes));
    }
}

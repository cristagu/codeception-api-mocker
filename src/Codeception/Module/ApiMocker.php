<?php

namespace Codeception\Module;

use Codeception\Lib\ModuleContainer;
use Codeception\Module;
use WebServer\WebServer;

class ApiMocker extends Module
{
    const CONFIG_PORT = 'port';
    const CONFIG_DEFAULT_PORT = 8080;

    public function __construct(ModuleContainer $moduleContainer, array $config = [])
    {
        $port = $config[self::CONFIG_PORT] ?? self::CONFIG_DEFAULT_PORT;

        $server = new WebServer($port);
    }
}

<?php

namespace WebServer;

use Symfony\Component\Process\PhpExecutableFinder;
use Symfony\Component\Process\Process;

class WebServer
{
    public const ROUTES_FILE = 'ROUTES_FILE';

    /** Process */
    public $process;

    public $routesFile;

    public function __construct(int $port)
    {
        $serverScript = __DIR__ . '/../../public/index.php';
        $phpExecutablePath = (new PhpExecutableFinder())->find();

        $this->routesFile = "/tmp/routes-" . substr(md5(microtime()), 0, 5) . ".tmp"; 

        $this->process = new Process([$phpExecutablePath, '-S', '0.0.0.0:8070', $serverScript], null,[self::ROUTES_FILE => $this->routesFile], null, null);
        $this->process->start(function ($type, $buffer) {
            var_dump($buffer);
        });

        // $process->wait(function ($type, $buffer) {
        //    echo $buffer;
        // });
    }
}

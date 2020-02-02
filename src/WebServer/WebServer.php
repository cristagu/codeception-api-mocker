<?php

namespace WebServer;

use Symfony\Component\Process\PhpExecutableFinder;
use Symfony\Component\Process\Process;

class WebServer
{
    public function __construct(int $port)
    {
        
        $serverScript = __DIR__ . '/../../public/index.php';
        $phpExecutablePath = (new PhpExecutableFinder())->find();

        $process = new Process([$phpExecutablePath, '-S', '0.0.0.0:8080', $serverScript], null, null, null, null);
        $process->start();

        // $process->wait(function ($type, $buffer) {
        //    echo $buffer;
        // });
    }
}

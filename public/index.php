<?php

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
    require_once __DIR__ . '/../vendor/autoload.php';
} 

$request = Request::createFromGlobals();
$response = new JsonResponse(['foo' => 'bar']);
$response->send();

<?php
declare(strict_types=1);
require_once(__DIR__ . '/vendor/autoload.php');


use MyFramework\Controllers\FrontController;
use Symfony\Component\HttpFoundation\Request;

$request = Request::createFromGlobals();

$frontController = new FrontController();
$response = $frontController->handle($request);
$response->send();







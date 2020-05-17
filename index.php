<?php
declare(strict_types=1);
require_once(__DIR__ . '/vendor/autoload.php');

use MyFramework\Controllers\AController;
use MyFramework\Controllers\BController;
use MyFramework\Route;
use Symfony\Component\HttpFoundation\Request;

$request = Request::createFromGlobals();

$routes = [];
$routes[] = new Route('/a', new AController(), 'GET');
$routes[] = new Route('/b', new BController(), 'GET');


foreach ($routes as $route) {
    if ($route->isRequestAcceptable($request)) {
        $controller = $route->getController();
        break;
    }
}

if (isset($controller)) {
    $response = $controller->getResponse($request);
    $response->send();
}




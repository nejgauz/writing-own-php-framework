<?php
declare(strict_types=1);
require_once(__DIR__ . '/vendor/autoload.php');

use MyFramework\Controllers\AController;
use MyFramework\Controllers\BController;
use MyFramework\Route;
use Symfony\Component\HttpFoundation\Request;

$request = Request::createFromGlobals();
$uri = $request->server->get('REQUEST_URI');

$routes = [];
$routes[] = new Route('/a', new AController());
$routes[] = new Route('/b', new BController());

foreach ($routes as $route) {
    if ($route->isUrlAcceptable($uri)) {
        $controller = $route->getController;
        break;
    }
}

$response = $controller->getResponse($request);
$response->send();



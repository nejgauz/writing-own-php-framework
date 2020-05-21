<?php
declare(strict_types=1);
require_once(__DIR__ . '/vendor/autoload.php');

use MyFramework\Controllers\AController;
use MyFramework\Controllers\BController;
use MyFramework\Controllers\CController;
use MyFramework\QueryRoute;
use MyFramework\Route;
use MyFramework\Router;
use Symfony\Component\HttpFoundation\Request;

$request = Request::createFromGlobals();

$router = new Router();
$router->addRoute(new Route('/a', new AController(), 'GET'));
$router->addRoute(new Route('/b', new BController(), 'GET'));
$router->addRoute(new QueryRoute('/c', new CController(), 'GET', 'test'));

$controller = $router->getController($request);

if (isset($controller)) {
    $controller->addContent($router->buildRoute('a'));
    $response = $controller->getResponse($request);
    $response->send();
}




<?php
declare(strict_types=1);
require_once(__DIR__ . '/vendor/autoload.php');


use MyFramework\Controllers\AController;
use MyFramework\Controllers\BController;
use MyFramework\Controllers\CController;
use MyFramework\MyExceptions\ParameterDoesntFitException;
use MyFramework\MyExceptions\RouteNotFoundException;
use MyFramework\QueryRoute;
use MyFramework\Route;
use MyFramework\Router;
use Symfony\Component\HttpFoundation\Request;

$request = Request::createFromGlobals();

$router = new Router();
$router->addRoute(new Route('/a', new AController($router), 'GET', 'a'));
$router->addRoute(new Route('/b', new BController($router), 'GET', 'b'));
$router->addRoute(new QueryRoute('~^/c/([0-9]{1,10})/profile$~', new CController($router), 'GET', 'c', '/c/%d/profile', '/[0-9]{1,10}/'));

try {
    $controller = $router->getController($request);
    $response = $controller->getResponse($request);
    $response->send();
} catch (RouteNotFoundException $r) {
    echo '<h1>' . $r->getMessage() . '</h1>';
} catch (ParameterDoesntFitException $p) {
    echo '<h1>Неверный параметр запроса</h1>';
}





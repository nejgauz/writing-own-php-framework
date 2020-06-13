<?php
declare(strict_types=1);
require_once(__DIR__ . '\..\vendor\autoload.php');


use App\Controllers\AController;
use App\Controllers\BController;
use App\Controllers\CController;
use MyFramework\FrontController;
use MyFramework\QueryRoute;
use MyFramework\Route;
use MyFramework\Router;
use Symfony\Component\HttpFoundation\Request;

$request = Request::createFromGlobals();

$frontController = new FrontController();
$router = new Router();
$aRoute = new Route('/a', new AController($router), 'GET', 'a');
$bRoute = new Route('/b', new BController($router), 'GET', 'b');
$cRoute = new QueryRoute('~^/c/([1-9][0-9]{1,9})/profile/([abcdef])$~', new CController($router), 'GET', 'c', '/c/%d/profile/%s', '/^[1-9][0-9]{1,9}/', '/^[abcdef]$/');
$response = $frontController->handle($request, $router, $aRoute, $bRoute, $cRoute);
$response->send();







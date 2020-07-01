<?php
declare(strict_types=1);
require_once(__DIR__ . '\..\vendor\autoload.php');


use App\Controllers\AController;
use App\Controllers\BController;
use App\Controllers\CController;
use App\SessionStartMw;
use MyFramework\FrontController;
use MyFramework\QueryRoute;
use MyFramework\Route;
use MyFramework\Router;
use Symfony\Component\HttpFoundation\Request;

$request = Request::createFromGlobals();

$aRoute = new Route('/a', new AController(), 'GET', 'a');
$bRoute = new Route('/b', new BController(), 'GET', 'b');
$cRoute = new QueryRoute('~^/c/([1-9][0-9]{1,9})/profile/([abcdef])$~', new CController(), 'GET', 'c', '/c/%d/profile/%s', '/^[1-9][0-9]{1,9}/', '/^[abcdef]$/');
$aRoute->addMiddleware(new SessionStartMw());
$bRoute->addMiddleware(new SessionStartMw());
$cRoute->addMiddleware(new SessionStartMw());
$router = new Router($aRoute, $bRoute, $cRoute);
$frontController = new FrontController($router);
$response = $frontController->handle($request);
$response->send();







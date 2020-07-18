<?php
declare(strict_types=1);
require_once(__DIR__ . '\..\vendor\autoload.php');


use App\AuthorizationMw;
use App\SessionStartMw;
use App\Controllers\AController;
use App\Controllers\AuthController;
use App\Controllers\BController;
use App\Controllers\CController;
use App\Controllers\LoginController;
use App\Controllers\LogoutController;
use MyFramework\FrontController;
use MyFramework\QueryRoute;
use MyFramework\Route;
use MyFramework\Router;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

$request = Request::createFromGlobals();
$session = new Session();

$aRoute = new Route('/a', new AController(), 'GET', 'a');
$bRoute = new Route('/b', new BController(), 'GET', 'b');
$cRoute = new QueryRoute('~^/c/([1-9][0-9]{1,9})/profile/([abcdef])$~', new CController(), 'GET', 'c', '/c/%d/profile/%s', '/^[1-9][0-9]{1,9}/', '/^[abcdef]$/');
$loginRoute = new Route('/login', new LoginController(), 'GET', 'login');
$logoutRoute = new Route('/logout', new LogoutController(), 'GET', 'logout');
$authRoute = new Route('/auth', new AuthController(), 'GET', 'auth');

$aRoute->addMiddleware(new AuthorizationMw(156, $session), new SessionStartMw($session));
$router = new Router($aRoute, $bRoute, $cRoute, $loginRoute, $logoutRoute, $authRoute);
$frontController = new FrontController($router, $session);
$response = $frontController->handle($request);
$response->send();







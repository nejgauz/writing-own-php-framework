<?php
declare(strict_types=1);
require_once(__DIR__ . '/vendor/autoload.php');

use Symfony\Component\HttpFoundation\Request;

$request = Request::createFromGlobals();
$uri = $request->server->get('REQUEST_URI');
$uri = substr($uri, 1);
$slashCount = substr_count($uri, '/');


if ($slashCount === 0) {
    $controllerName = '\\MyFramework\Controllers\\' . ucfirst($uri) . 'Controller';
    try {
        $controller = new $controllerName();
        $response = $controller->getResponse($request);
        $response->send();
    }
    catch (Error $e) {
        echo 'Ошибка: ' . $e->getMessage() . '. ';
    }
} elseif ($slashCount === 1) {
    $info = explode('/', $uri);
    $action = isset($info[1]) ? $info[1] : ' ';
    $controllerName = isset($info[0]) ? ($info[0]) : ' ';
    $controllerName = '\\MyFramework\Controllers\\' . ucfirst($controllerName) . 'Controller';
    $actionName = 'action' . ucfirst($action);
    try {
        $controller = new $controllerName();
        $controller->$actionName();
    }
    catch (Error $e) {
        echo 'Ошибка: ' . $e->getMessage() . '. ';
    }
}



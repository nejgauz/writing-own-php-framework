<?php
declare(strict_types=1);


namespace MyFramework\Controllers;


use MyFramework\MyExceptions\ParameterDoesntFitException;
use MyFramework\MyExceptions\ParameterNotFoundException;
use MyFramework\MyExceptions\RouteNotFoundException;
use MyFramework\QueryRoute;
use MyFramework\Route;
use MyFramework\Router;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FrontController
{

    public function handle(Request $request): Response
    {
        $router = new Router();
        $router->addRoute(new Route('/a', new AController($router), 'GET', 'a'));
        $router->addRoute(new Route('/b', new BController($router), 'GET', 'b'));
        $router->addRoute(new QueryRoute('~^/c/([1-9][0-9]{1,9})/profile/([abcdef])$~', new CController($router), 'GET', 'c', '/c/%d/profile/%s', '/^[1-9][0-9]{1,9}/', '/^[abcdef]$/'));

        try {
            $result = $router->getControllerWithParams($request);
        } catch (RouteNotFoundException $r) {
            return new Response(
                '<h1> Неверный адрес запроса </h1>',
                Response::HTTP_NOT_FOUND
            );
        }

        $controller = $result->getController();

        try {
            return $controller->getResponse($request, ...$result->getParameters());
        } catch (ParameterNotFoundException | ParameterDoesntFitException $p) {
            return new Response(
                '<h1> Параметр запроса не найден, либо не подходит </h1>',
                Response::HTTP_NOT_FOUND
            );
        }

    }
}
<?php
declare(strict_types=1);


namespace MyFramework;


use MyFramework\Interfaces\RouteInterface;
use MyFramework\MyExceptions\ParameterDoesntFitException;
use MyFramework\MyExceptions\ParameterNotFoundException;
use MyFramework\MyExceptions\RouteNotFoundException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FrontController
{

    public function handle(Request $request, Router $router, RouteInterface ...$routes): Response
    {
        foreach ($routes as $route) {
            $router->addRoute($route);
        }
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
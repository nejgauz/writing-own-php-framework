<?php
declare(strict_types=1);

namespace MyFramework;


use MyFramework\MyExceptions\RouteNotFoundException;
use Symfony\Component\HttpFoundation\Request;

class Router
{
    /**
     * @var array $routes - массив с объектами RouteInterface
     */
    protected $routes = [];


    /**
     * Добавляет роуты в массив с роутами
     * @param RouteInterface $route
     */
    public function addRoute(RouteInterface $route)
    {
        $this->routes[] = $route;
    }

    /**
     * @param Request $request
     * @return ControllerInterface возвращает контроллер в соответствии с запросом
     * @throws RouteNotFoundException
     */
    public function getController(Request $request): ControllerInterface
    {
        foreach ($this->routes as $route) {
           if ($route->isRequestAcceptable($request)) {
               return $route->getController();
           }
        }
        throw new RouteNotFoundException();
    }

    /**
     * @param string $name
     * @return string возвращает урл по имени роута
     * @throws RouteNotFoundException
     */
    public function buildRoute(string $name): string
    {
        foreach ($this->routes as $route) {
            if ($route->name() === $name) {
                return $route->url();
            }
        }
        throw new RouteNotFoundException();
    }

    /**
     * Строит урл для запроса с параметром
     * @param string $name
     * @param string $parameter
     * @param string $value
     * @return string
     * @throws RouteNotFoundException
     */
    public function buildQueryRoute(string $name, string $parameter, string $value): string
    {
        foreach ($this->routes as $route) {
            if ($route->name() === $name && $route instanceof QueryRoute) {
                if ($route->getParameterName() === $parameter && preg_match($route->getParameterPattern(), $value)) {
                    return $route->url() . '/' . $value;
                }
            }

        }

        throw new RouteNotFoundException();
    }

}
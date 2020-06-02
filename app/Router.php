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
            if ($route->getName() === $name) {
                return $route->getUrl();
            }
        }
        throw new RouteNotFoundException();
    }

    /**
     * Строит урл для запроса с параметром
     * @param string $name имя роута
     * @param string $value значение параметра
     * @return string
     * @throws RouteNotFoundException
     */
    public function buildQueryRoute(string $name, string $value): string
    {
        foreach ($this->routes as $route) {
            if ($route->getName() === $name && $route instanceof QueryRoute) {
                return $route->buildUrl($value);
            }

        }

        throw new RouteNotFoundException();
    }

    /**
     * @param Request $request
     * @return array
     * @throws RouteNotFoundException
     */
    public function getParametersFromRequest(Request $request): array
    {
        foreach ($this->routes as $route) {
            if ($route->isRequestAcceptable($request)) {
                return $route->getParameters($request);
            }
        }

        throw new RouteNotFoundException();

    }

}
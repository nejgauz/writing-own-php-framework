<?php
declare(strict_types=1);

namespace MyFramework;


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
     * @return ControllerInterface|null возвращает контроллер в соответствии с запросом
     */
    public function getController(Request $request):? ControllerInterface
    {
        foreach ($this->routes as $route) {
           if ($route->isRequestAcceptable($request)) {
               return $route->getController();
           }
        }
        return null;
    }

    /**
     * @param string $name
     * @return string возвращает урл по имени роута
     */
    public function buildRoute(string $name): string
    {
        foreach ($this->routes as $route) {
            if ($route->name() === $name) {
                return $route->url();
            }
        }

    }

}
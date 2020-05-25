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
        throw new RouteNotFoundException('Данный маршрут не найден');
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
        throw new RouteNotFoundException("Роута с именем '$name' не существует");
    }

}
<?php
declare(strict_types=1);

namespace MyFramework;


use MyFramework\Interfaces\RouteInterface;
use MyFramework\MyExceptions\RouteNotFoundException;
use Symfony\Component\HttpFoundation\Request;

class Router
{
    /**
     * @var array $routes - массив с объектами RouteInterface
     */
    protected $routes = [];

    /**
     * Router constructor.
     * @param RouteInterface ...$routes
     */
    public function __construct(RouteInterface ...$routes)
    {
        foreach ($routes as $route) {
            $this->routes[] = $route;
        }
    }


    /**
     * @param Request $request
     * @return ControllerWithParametersWithMws
     * @throws RouteNotFoundException
     */
    public function getControllerWithParamsWithMws(Request $request): ControllerWithParametersWithMws
    {
        foreach ($this->routes as $route) {
           if ($route->isRequestAcceptable($request)) {
               return new ControllerWithParametersWithMws($route->getController(), $route->params($request), $route->getMiddleware());
           }
        }
        throw new RouteNotFoundException();
    }

    /**
     * @param string $name имя роута, урл которого нужно построить
     * @param string ...$value параметры для роута с параметрами
     * @return string возвращает урл по имени роута
     * @throws RouteNotFoundException
     */
    public function buildRoute(string $name, string ...$value): string
    {
        foreach ($this->routes as $route) {
            if ($route->getName() === $name) {
                $requiredRoute = $route;
                break;
            }
        }
        if (!isset($requiredRoute)) {
            throw new RouteNotFoundException();
        }

        return $requiredRoute->getUrl(...$value);
    }



}
<?php
declare(strict_types=1);

namespace MyFramework;


use Symfony\Component\HttpFoundation\Request;

class Route implements RouteInterface
{
    /**
     * @var string $url вида '/abc'
     */
    protected $url;

    /**
     * @var ControllerInterface
     */
    protected $controller;

    /**
     * @var string
     */
    protected $method;


    /**
     * Route constructor.
     * @param string $url
     * @param ControllerInterface $controller
     * @param string $method
     */
    public function __construct(string $url, ControllerInterface $controller, string $method)
    {
        $this->url = $url;
        $this->controller = $controller;
        $this->method = $method;
    }

    /**
     * Возвращает объект контроллера, привязанный к объекту класса
     * @return ControllerInterface|object
     */
    public function getController(): ControllerInterface
    {
        return $this->controller;
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function isRequestAcceptable(Request $request): bool
    {
        if (!($request->server->get('REQUEST_URI') === $this->url)) {
            return false;
        }
        if (!($request->isMethod($this->method))) {
            return false;
        }
        return true;
    }

}
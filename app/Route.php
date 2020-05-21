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
        $uri = $request->server->get('REQUEST_URI');
        if (strstr($uri, '?')) {
            $uri = stristr($uri, '?', true);
        }
        if (!($uri === $this->url)) {
            return false;
        }
        if (!($request->isMethod($this->method))) {
            return false;
        }
        return true;
    }

    /**
     * @return string имя роута формата 'news.list'
     */
    public function name(): string
    {
        $name = substr($this->url, 1);
        if (!strpos($name, '/')) {
            return $name;
        }
        $subNames = explode('/', $name);
        foreach ($subNames as $subName) {
            $name .= '.' . $subName;
        }
        return $name;
    }

    public function url(): string
    {
        return $this->url;
    }

}
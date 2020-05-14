<?php


namespace MyFramework;


class Route implements RouteInterface
{
    /**
     * @var string $url вида '/abc'
     */
    protected $url;

    /**
     * @var object
     */
    protected $controller;

    /**
     * Route constructor.
     * @param string $url
     * @param object $controller
     */
    public function __construct(string $url, $controller)
    {
        $this->url = $url;
        $this->controller = $controller;

    }

    /**
     * Возвращает объект контроллера, привязанный к объекту класса
     * @return ControllerInterface|object
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * Проверяет, совпадает ли урл с урлом объекта класса
     * @param string $url
     * @return bool
     */
    public function isUrlAcceptable(string $url): bool
    {
        if ($url === $this->url) {
            return true;
        }
        return false;
    }

}
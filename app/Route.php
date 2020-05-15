<?php
declare(strict_types=1);

namespace MyFramework;


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
     * Route constructor.
     * @param string $url
     * @param ControllerInterface $controller
     */
    public function __construct(string $url, ControllerInterface $controller)
    {
        $this->url = $url;
        $this->controller = $controller;
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
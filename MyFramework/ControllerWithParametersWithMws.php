<?php
declare(strict_types=1);


namespace MyFramework;


use MyFramework\Interfaces\ControllerInterface;

class ControllerWithParametersWithMws
{
    /**
     * @var ControllerInterface
     */
    protected $controller;

    /**
     * @var array
     */
    protected $parameters;

    /**
     * @var array
     */
    protected $middlewares;

    /**
     * ControllerWithParametersWithMws constructor.
     * @param ControllerInterface $controller
     * @param array $parameters
     * @param array $middlewares
     */
    public function __construct(ControllerInterface $controller, array $parameters, array $middlewares)
    {
        $this->parameters = $parameters;
        $this->controller = $controller;
        $this->middlewares = $middlewares;
    }

    /**
     * @return ControllerInterface
     */
    public function getController(): ControllerInterface
    {
        return $this->controller;
    }

    /**
     * @return array
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    /**
     * @return array
     */
    public function getMidlewares(): array
    {
        return $this->middlewares;
    }

}
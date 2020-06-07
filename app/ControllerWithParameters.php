<?php
declare(strict_types=1);


namespace MyFramework;


class ControllerWithParameters
{
    /**
     * @var ControllerInterface
     */
    protected $controller;

    /**
     * @var array
     */
    protected $parameters;

    public function __construct(ControllerInterface $controller, array $parameters)
    {
        $this->parameters = $parameters;
        $this->controller = $controller;
    }

    public function getController(): ControllerInterface
    {
        return $this->controller;
    }

    public function getParameters(): array
    {
        return $this->parameters;
    }

}
<?php


namespace MyFramework\Controllers;


use MyFramework\ControllerInterface;
use MyFramework\Router;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ControllerClass implements ControllerInterface
{
    /**
     * @var array $parameters массив с параметрами
     */
    protected $parameters = [];

    /**
     * @var Router объект
     */
    protected $router;

    /**
     * ControllerClass constructor.
     * @param Router $router
     */
    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    /**
     * @param Request $request
     * @param array $parameters
     * @return Response
     */
    public function getResponse(Request $request, ...$parameters): Response
    {
        $this->parameters = $parameters;
        return new Response(
            '<h1>ControllerClass</h1>'
        );
    }



}
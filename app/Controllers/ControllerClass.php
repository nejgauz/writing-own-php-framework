<?php


namespace MyFramework\Controllers;


use MyFramework\ControllerInterface;
use MyFramework\Router;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ControllerClass implements ControllerInterface
{
    /**
     * @var $parameterExtractor - функция обратного вызова
     */
    protected $parameterExtractor;
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
     * @return Response
     */
    public function getResponse(Request $request): Response
    {
        $response = new Response(
            '<h1>ControllerClass</h1>'
        );
        return $response;
    }

    /**
     * @param callable $callback
     */
    public function addParameterExtractor(callable $callback)
    {
        $this->parameterExtractor = $callback;
    }

}
<?php
declare(strict_types=1);

namespace MyFramework\Interfaces;


use MyFramework\Router;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface ControllerInterface
{

    /**
     * @param Request $request
     * @param Router $router
     * @param mixed ...$parameters
     * @return Response
     */
    public function getResponse(Request $request, Router $router, ...$parameters): Response;

}
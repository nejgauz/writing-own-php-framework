<?php
declare(strict_types=1);

namespace MyFramework\Interfaces;


use MyFramework\Router;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

interface ControllerInterface
{

    /**
     * @param Request $request
     * @param Router $router
     * @param mixed ...$parameters
     * @return Response
     */
    public function getResponse(Request $request, Router $router, ...$parameters): Response;

    /**
     * @param Session $session
     */
    public function addSession(Session $session): void;

}
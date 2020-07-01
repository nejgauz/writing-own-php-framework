<?php


namespace MyFramework;


use MyFramework\Interfaces\ControllerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

abstract class BaseController implements ControllerInterface
{
    protected $session;

    /**
     * @inheritDoc
     */
    abstract function getResponse(Request $request, Router $router, ...$parameters): Response;

    public function addSession(Session $session): void
    {
        $this->session = $session;
    }
}
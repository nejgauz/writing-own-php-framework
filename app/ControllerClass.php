<?php
declare(strict_types=1);

namespace MyFramework;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ControllerClass implements ControllerInterface
{
    /**
     * @param Request $request
     * @return Response
     */
    public function getResponse(Request $request): Response
    {
        return new Response();
    }
}
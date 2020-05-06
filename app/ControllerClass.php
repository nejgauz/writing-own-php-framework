<?php

namespace MyFramework;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ControllerClass implements ControllerInterface
{
    /**
     * @param Request $request
     * @return Response
     */
    public function getResponse(Request $request)
    {
        $response = new Response();
        $response->prepare($request);

        return $response;
    }
}
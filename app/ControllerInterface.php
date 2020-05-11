<?php


namespace MyFramework;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface ControllerInterface
{
    /**
     * @param Request $request
     * @return Response
     */
    public function getResponse(Request $request);
}
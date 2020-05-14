<?php
namespace MyFramework\Controllers;


use MyFramework\ControllerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AController implements ControllerInterface
{
    /**
     * @param Request $request
     * @return Response
     */
    public function getResponse(Request $request): Response
    {
        $response = new Response(
            '<h1>AController</h1>'
        );
        return $response;
    }


}
<?php
declare(strict_types=1);
namespace MyFramework\Controllers;


use MyFramework\ControllerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CController implements ControllerInterface
{
    /**
     * @param Request $request
     * @return Response
     */
    public function getResponse(Request $request): Response
    {
        $response = new Response(
            '<h1>CController</h1>'
        );
        return $response;
    }

}
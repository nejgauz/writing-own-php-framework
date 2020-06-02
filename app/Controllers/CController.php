<?php
declare(strict_types=1);
namespace MyFramework\Controllers;



use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CController extends ControllerClass
{
    /**
     * @param Request $request
     * @return Response
     */
    public function getResponse(Request $request): Response
    {
        $response = new Response(
            var_dump($this->router->getParametersFromRequest($request))
        );
        return $response;
    }


}
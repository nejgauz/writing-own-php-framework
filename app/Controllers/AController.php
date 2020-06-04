<?php
declare(strict_types=1);
namespace MyFramework\Controllers;



use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AController extends ControllerClass
{
    /**
     * @param Request $request
     * @return Response
     */
    public function getResponse(Request $request): Response
    {
        $response = new Response(
            '<h1>' . $this->router->buildRoute('c', '17') . '</h1>'
        );
        return $response;
    }

}
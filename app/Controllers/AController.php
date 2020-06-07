<?php
declare(strict_types=1);
namespace MyFramework\Controllers;



use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AController extends ControllerClass
{
    /**
     * @param Request $request
     * @param array $parameters
     * @return Response
     * @throws \MyFramework\MyExceptions\RouteNotFoundException
     */
    public function getResponse(Request $request, ...$parameters): Response
    {
        return new Response(
            '<h1>' . $this->router->buildRoute('c', '40', 'f') . '</h1>'
        );
    }

}
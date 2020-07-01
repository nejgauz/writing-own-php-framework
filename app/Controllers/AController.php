<?php
declare(strict_types=1);
namespace App\Controllers;



use MyFramework\BaseController;
use MyFramework\MyExceptions\RouteNotFoundException;
use MyFramework\Router;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AController extends BaseController
{
    /**
     * @param Request $request
     * @param Router $router
     * @param array $parameters
     * @return Response
     * @throws RouteNotFoundException
     */
    public function getResponse(Request $request, Router $router, ...$parameters): Response
    {
        return new Response(
            '<h1>' . $router->buildRoute('c', '40', 'f') . '</h1>'
        );
    }

}
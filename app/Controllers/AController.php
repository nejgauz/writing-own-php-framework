<?php
declare(strict_types=1);
namespace App\Controllers;



use MyFramework\Interfaces\ControllerInterface;
use MyFramework\Router;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AController implements ControllerInterface
{
    /**
     * @param Request $request
     * @param Router $router
     * @param array $parameters
     * @return Response
     */
    public function getResponse(Request $request, Router $router, ...$parameters): Response
    {
        return new Response(
            '<h1>' . $router->buildRoute('c', '40', 'f') . '</h1>'
        );
    }

}
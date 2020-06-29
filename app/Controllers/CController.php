<?php
declare(strict_types=1);
namespace App\Controllers;



use MyFramework\Interfaces\ControllerInterface;
use MyFramework\Router;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CController implements ControllerInterface
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
            var_dump($parameters)
        );
    }

}
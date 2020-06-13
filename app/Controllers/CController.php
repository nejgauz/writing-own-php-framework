<?php
declare(strict_types=1);
namespace App\Controllers;



use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CController extends ControllerClass
{
    /**
     * @param Request $request
     * @param array $parameters
     * @return Response
     */
    public function getResponse(Request $request, ...$parameters): Response
    {
        return new Response(
            var_dump($parameters)
        );
    }

}
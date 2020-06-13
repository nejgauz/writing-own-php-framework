<?php
declare(strict_types=1);
namespace App\Controllers;




use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BController extends ControllerClass
{
    /**
     * @param Request $request
     * @param array $parameters
     * @return Response
     */
    public function getResponse(Request $request, ...$parameters): Response
    {
        return new Response(
            '<h1>BController</h1>'
        );
    }

}
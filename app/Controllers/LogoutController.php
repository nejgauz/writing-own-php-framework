<?php


namespace App\Controllers;


use MyFramework\BaseController;
use MyFramework\Router;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LogoutController extends BaseController
{

    /**
     * @inheritDoc
     */
    public function getResponse(Request $request, Router $router, ...$parameters): Response
    {
        $this->session->remove('user_id');
        return new Response(
            '<h1>Выход успешно выполнен</h1>'
        );
    }
}
<?php


namespace App\Controllers;


use MyFramework\BaseController;
use MyFramework\Router;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends BaseController
{

    /**
     * @inheritDoc
     */
    public function getResponse(Request $request, Router $router, ...$parameters): Response
    {
        $this->session->set('user_id', 156);
        return new Response(
            '<h1>Вход выполнен успешно</h1>'
        );
    }
}
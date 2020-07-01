<?php


namespace App\Controllers;


use MyFramework\BaseController;
use MyFramework\Router;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

class AuthController extends BaseController
{

    /**
     * @inheritDoc
     */
    public function getResponse(Request $request, Router $router, ...$parameters): Response
    {
        if ($this->session instanceof Session && $this->session->get('user_id') === 156) {
            return new Response(
                '<h1>Доступ к контенту разрешен</h1>'
            );
        }
        return new Response(
            '<h1>Доступ к контенту запрещен</h1>',
            Response::HTTP_FORBIDDEN
        );
    }
}
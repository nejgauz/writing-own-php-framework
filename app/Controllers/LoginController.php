<?php


namespace App\Controllers;


use MyFramework\Interfaces\ControllerInterface;
use MyFramework\Router;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LoginController implements ControllerInterface
{

    /**
     * @inheritDoc
     */
    public function getResponse(Request $request, Router $router, ...$parameters): Response
    {
        $_SESSION['user_id'] = 154;
        return new Response(
            '<h1>Вход выполнен успешно</h1>'
        );
    }
}
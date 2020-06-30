<?php


namespace App\Controllers;


use MyFramework\Interfaces\ControllerInterface;
use MyFramework\Router;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LogoutController implements ControllerInterface
{

    /**
     * @inheritDoc
     */
    public function getResponse(Request $request, Router $router, ...$parameters): Response
    {
        unset($_SESSION['user_id']);
        return new Response(
            '<h1>Выход успешно выполнен</h1>'
        );
    }
}
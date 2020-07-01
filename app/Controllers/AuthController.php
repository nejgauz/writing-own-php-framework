<?php


namespace App\Controllers;


use MyFramework\Interfaces\ControllerInterface;
use MyFramework\Router;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthController implements ControllerInterface
{

    /**
     * @inheritDoc
     */
    public function getResponse(Request $request, Router $router, ...$parameters): Response
    {
        if (isset($_SESSION['user_id']) && $_SESSION['user_id'] === 154) {
            return new Response(
                '<h1>Доступ к контенту разрешен</h1>'
            );
        }
        return new Response(
            '<h1>Доступ к контенту запрещен</h1>',
            Response::HTTP_FORBIDDEN
        );
    }

    public function isAuthorized(int $id): bool
    {
        
    }
}
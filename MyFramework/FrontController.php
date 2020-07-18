<?php
declare(strict_types=1);


namespace MyFramework;


use MyFramework\MyExceptions\ParameterDoesntFitException;
use MyFramework\MyExceptions\ParameterNotFoundException;
use MyFramework\MyExceptions\RouteNotFoundException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

class FrontController
{
    /**
     * @var Router $router
     */
    protected $router;

    /**
     * @var Session
     */
    protected $session;

    /**
     * FrontController constructor.
     * @param Router $router
     * @param Session $session
     */
    public function __construct(Router $router, Session $session)
    {
        $this->router = $router;
        $this->session = $session;
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function handle(Request $request): Response
    {
        try {
            $result = $this->router->getControllerWithParamsWithMws($request);
            $mws = $result->getMidlewares();
        } catch (RouteNotFoundException $r) {
            return new Response(
                '<h1> Неверный адрес запроса </h1>',
                Response::HTTP_NOT_FOUND
            );
        }

        if (!empty($mws)) {
            foreach ($mws as $mw) {
                if ($mw->before() instanceof Response) {
                    return $mw->before();
                } else {
                    $mw->before();
                }
            }
        }

        $controller = $result->getController();
        $controller->addSession($this->session);

        try {
            return $controller->getResponse($request, $this->router, ...$result->getParameters());
        } catch (ParameterNotFoundException | ParameterDoesntFitException $p) {
            return new Response(
                '<h1> Параметр запроса не найден, либо не подходит </h1>',
                Response::HTTP_NOT_FOUND
            );
        } finally {
            if (!empty($mws)) {
                foreach ($mws as $mw) {
                    $mw->after();
                }
            }
        }
    }
}
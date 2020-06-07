<?php
declare(strict_types=1);

namespace MyFramework;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface ControllerInterface
{
    /**
     * ControllerInterface constructor.
     * @param Router $router
     */
    public function __construct(Router $router);

    /**
     * @param Request $request
     * @param mixed ...$parameters
     * @return Response
     */
    public function getResponse(Request $request, ...$parameters): Response;

}
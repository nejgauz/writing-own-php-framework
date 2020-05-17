<?php
declare(strict_types=1);


namespace MyFramework;


use Symfony\Component\HttpFoundation\Request;

interface RouteInterface
{
    /**
     * @return \MyFramework\ControllerInterface
     */
    public function getController(): ControllerInterface;

    /**
     * @param Request $request
     * @return bool
     */
    public function isRequestAcceptable(Request $request): bool;

}
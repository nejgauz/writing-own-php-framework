<?php


namespace MyFramework;

use MyFramework\ControllerInterface;

interface RouteInterface
{
    /**
     * @return \MyFramework\ControllerInterface
     */
    public function getController(): ControllerInterface;

    /**
     * @param string $url
     * @return bool
     */
    public function isUrlAcceptable(string $url): bool;

}
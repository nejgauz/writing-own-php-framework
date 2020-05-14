<?php


namespace MyFramework;


interface RouteInterface
{
    /**
     * @return \MyFramework\ControllerInterface
     */
    public function getController();

    /**
     * @param string $url
     * @return bool
     */
    public function isUrlAcceptable(string $url): bool;

}
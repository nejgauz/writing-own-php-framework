<?php
declare(strict_types=1);


namespace MyFramework;


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
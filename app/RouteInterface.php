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

    /**
     * @return string имя роута формата 'news.list'
     */
    public function name(): string;

    /**
     * @return string урл роута вида `/news`
     */
    public function url(): string;

}
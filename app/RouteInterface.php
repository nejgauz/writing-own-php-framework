<?php
declare(strict_types=1);


namespace MyFramework;


use Symfony\Component\HttpFoundation\Request;

interface RouteInterface
{
    /**
     * @return ControllerInterface
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
    public function getName(): string;

    /**
     * @return string урл роута вида `/news`
     */
    public function getUrl(): string;

}
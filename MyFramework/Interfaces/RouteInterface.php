<?php
declare(strict_types=1);


namespace MyFramework\Interfaces;


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
     * @param $value - параметры урла
     * @return string урл роута вида `/news`
     */
    public function getUrl(...$value): string;

    /**
     * @param Request $request
     * @return array
     */
    public function params(Request $request): array;

    /**
     * @param MiddlewareInterface ...$mws
     */
    public function addMiddleware(MiddlewareInterface ...$mws): void;

    /**
     * @return array
     */
    public function getMiddleware(): array;

}
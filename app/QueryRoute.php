<?php
declare(strict_types=1);


namespace MyFramework;


use Symfony\Component\HttpFoundation\Request;

class QueryRoute extends Route
{
    /**
     * @var string $getParameter
     */
    protected $getParameter;

    /**
     * QueryRoute constructor.
     * @param string $url
     * @param ControllerInterface $controller
     * @param string $method
     * @param string $getParameter
     */
    public function __construct(string $url, ControllerInterface $controller, string $method, string $getParameter)
    {
        parent::__construct($url, $controller, $method);
        $this->getParameter = $getParameter;
    }

    /**
     * Метод проверяет, подходит ли запрос для роута
     * @param Request $request
     * @return bool
     */
    public function isRequestAcceptable(Request $request): bool
    {
        if (!$request->query->get($this->getParameter, false)) {
            return false;
        }
        return parent::isRequestAcceptable($request);
    }

}
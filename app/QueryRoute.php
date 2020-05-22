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

    public function __construct(string $url, ControllerInterface $controller, string $method, string $getParameter)
    {
        parent::__construct($url, $controller, $method);
        $this->getParameter = $getParameter;
    }

    public function isRequestAcceptable(Request $request): bool
    {
        if (!$request->query->get($this->getParameter, false)) {
            return false;
        }
        return parent::isRequestAcceptable($request);
    }

}
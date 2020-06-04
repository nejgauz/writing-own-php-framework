<?php
declare(strict_types=1);


namespace MyFramework;


use MyFramework\MyExceptions\ParameterDoesntFitException;
use MyFramework\MyExceptions\RequestDoesntFitException;
use Symfony\Component\HttpFoundation\Request;

class QueryRoute extends Route
{
    /**
     * @var string $urlFormat шаблон для подстановки параметров
     */
    protected $urlFormat;

    /**
     * @var string regex паттерн для параметра
     */
    protected $parameterPattern;

    /**
     * QueryRoute constructor.
     * @param string $url regex паттерн для всего урла
     * @param ControllerInterface $controller контроллер, обрабатывающий роут
     * @param string $method метод запроса, на который отвечает роут
     * @param string $name название роута
     * @param string $urlFormat шаблон для подстановки параметров
     * @param string $parameterPattern regex паттерн для параметра
     */
    public function __construct(string $url, ControllerInterface $controller, string $method, string $name, string $urlFormat, string $parameterPattern)
    {
        parent::__construct($url, $controller, $method, $name);
        $this->urlFormat = $urlFormat;
        $this->parameterPattern = $parameterPattern;
        $extractor = function (Request $request) {
            if ($this->isRequestAcceptable($request)) {
                $requestUrl = $request->server->get('REQUEST_URI');
                preg_match($this->url, $requestUrl, $parameters);
                $parameters[0] = false;
                return array_filter($parameters);
            }

            throw new RequestDoesntFitException();
        };
        $controller->addParameterExtractor($extractor);
    }

    /**
     * Метод проверяет, подходит ли запрос для роута
     * @param Request $request
     * @return bool
     */
    public function isRequestAcceptable(Request $request): bool
    {
        $requestUrl = $request->server->get('REQUEST_URI');
        if (!preg_match($this->url, $requestUrl)) {
            return false;
        }
        if (!$request->isMethod($this->method)) {
            return false;
        }
        return true;

    }

    /**
     * @param string $value
     * @return string
     * @throws ParameterDoesntFitException
     */
    public function buildUrl($value): string
    {
        if (preg_match($this->parameterPattern, $value)) {
            return sprintf($this->urlFormat, $value);
        }

        throw new ParameterDoesntFitException();
    }

}
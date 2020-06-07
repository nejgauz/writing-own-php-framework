<?php
declare(strict_types=1);


namespace MyFramework;


use MyFramework\MyExceptions\ParameterDoesntFitException;
use MyFramework\MyExceptions\ParameterNotFoundException;
use Symfony\Component\HttpFoundation\Request;

class QueryRoute extends Route
{
    /**
     * @var string $urlFormat шаблон для подстановки параметров
     */
    protected $urlFormat;

    /**
     * @var array of strings regex паттернов для всех параметров
     */
    protected $parameterPattern;

    /**
     * QueryRoute constructor.
     * @param string $url regex паттерн для всего урла
     * @param ControllerInterface $controller контроллер, обрабатывающий роут
     * @param string $method метод запроса, на который отвечает роут
     * @param string $name название роута
     * @param string $urlFormat шаблон для подстановки параметров
     * @param array $parameterPattern regex паттерн для параметра
     */
    public function __construct(string $url, ControllerInterface $controller, string $method, string $name, string $urlFormat, string ...$parameterPattern)
    {
        parent::__construct($url, $controller, $method, $name);
        $this->urlFormat = $urlFormat;
        $this->parameterPattern = $parameterPattern;
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
     * @param array $value массив со значениями параметров вида ['параметр1', 'параметр2' ...]
     * @return string построенный урл
     * @throws ParameterDoesntFitException
     * @throws ParameterNotFoundException
     */
    public function getUrl(...$value): string
    {
        if (!$value) {
            throw new ParameterNotFoundException();
        }
        $value = $value[0];
        if (count($value) !== count($this->parameterPattern)) {
            throw new ParameterNotFoundException();
        }
        $length = count($value);
        $patterns = [];
        for ($i = 0; $i < $length; $i++) {
           $patterns[$this->parameterPattern[$i]] = $value[$i];
        }
        foreach ($patterns as $pattern => $parameter) {
            if (!preg_match($pattern, $parameter)) {
                throw new ParameterDoesntFitException();
            }
        }

        return sprintf($this->urlFormat, ...$value);
    }

    /**
     * @param Request $request
     * @return array
     */
    public function params(Request $request): array
    {
        $requestUrl = $request->server->get('REQUEST_URI');
        preg_match($this->url, $requestUrl, $parameters);
        array_shift($parameters);

        return $parameters;
    }

}
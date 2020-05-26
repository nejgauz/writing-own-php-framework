<?php
declare(strict_types=1);


namespace MyFramework;


use Symfony\Component\HttpFoundation\Request;

class QueryRoute extends Route
{
    /**
     * @var string $parameterName
     */
    protected $parameterName;

    /**
     * @var string regex
     */
    protected $parameterPattern;

    /**
     * @var string $urlPattern regex для всего урла
     */
    protected $urlPattern;

    /**
     * QueryRoute constructor.
     * @param string $url
     * @param ControllerInterface $controller контроллер, обрабатывающий роут
     * @param string $method метод запроса, на который отвечает роут
     * @param string $name название роута
     * @param string $parameterName название параметра
     * @param string $parameterPattern строка с регулярным выражением - паттерн для параметра без ограничительных знаков
     * @param string $urlPattern regex для всего урла
     */
    public function __construct(string $url, ControllerInterface $controller, string $method, string $name, string $parameterName, string $parameterPattern, string $urlPattern)
    {
        parent::__construct($url, $controller, $method, $name);
        $this->parameterName = $parameterName;
        $this->parameterPattern = $parameterPattern;
        $this->urlPattern = $urlPattern;
    }

    /**
     * Метод проверяет, подходит ли запрос для роута
     * @param Request $request
     * @return bool
     */
    public function isRequestAcceptable(Request $request): bool
    {
        $requestUrl = $request->server->get('REQUEST_URI');
        if (!preg_match($this->urlPattern, $requestUrl)) {
            return false;
        }
        if (!$request->isMethod($this->method)) {
            return false;
        }
        return true;

    }

    /**
     * @return string имя параметра
     */
    public function getParameterName(): string
    {
        return $this->parameterName;
    }

    /**
     * @return string паттерн для параметра
     */
    public function getParameterPattern(): string
    {
        return $this->parameterPattern;
    }

}
<?php


namespace MyFramework\Controllers;


use MyFramework\ControllerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ControllerClass implements ControllerInterface
{
    /**
     * @var string
     */
    protected $content = '<h1>ControllerClass</h1>';

    /**
     * @param Request $request
     * @return Response
     */
    public function getResponse(Request $request): Response
    {
        $response = new Response(
            $this->content
        );
        return $response;
    }

    /**
     * @param string $content
     */
    public function addContent(string $content)
    {
        if ($content) {
            $this->content = $content;
        }
    }

}
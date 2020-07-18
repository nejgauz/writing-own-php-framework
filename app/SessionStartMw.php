<?php


namespace App;


use MyFramework\Interfaces\MiddlewareInterface;
use Symfony\Component\HttpFoundation\Session\Session;

class SessionStartMw implements MiddlewareInterface
{
    /**
     * @var Session
     */
    protected $session;

    /**
     * SessionStartMw constructor.
     * @param Session $session
     */
    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    public function before()
    {
        $this->session->start();
    }

    public function after()
    {
        //
    }


}
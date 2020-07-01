<?php


namespace App;


use MyFramework\Interfaces\MiddlewareInterface;

class SessionStartMw implements MiddlewareInterface
{

    public function before()
    {
        session_start();

    }

    public function after()
    {
        //
    }


}
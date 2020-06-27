<?php


namespace App;


use MyFramework\Interfaces\MiddlewareInterface;

class Test implements MiddlewareInterface
{

    public function before()
    {
        echo 'Привет!';
    }

    public function after()
    {
        echo 'Пока';
    }
}
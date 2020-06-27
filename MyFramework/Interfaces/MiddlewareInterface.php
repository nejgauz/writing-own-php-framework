<?php
declare(strict_types=1);


namespace MyFramework\Interfaces;


interface MiddlewareInterface
{
    public function before();

    public function after();

}
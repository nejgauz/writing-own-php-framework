<?php
declare(strict_types=1);


namespace MyFramework\Interfaces;


interface MiddlewareInterface
{
    /**
     * @return mixed
     */
    public function before();

    /**
     * @return mixed
     */
    public function after();

}
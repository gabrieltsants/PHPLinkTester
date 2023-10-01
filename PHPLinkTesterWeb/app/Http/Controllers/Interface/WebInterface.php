<?php

namespace App\Http\Controllers\Interface;


abstract class WebInterface
{
    public function __construct(protected ?WebInterface $nextInterface) { }

    abstract public function validateInterfaceType(string $method);
}

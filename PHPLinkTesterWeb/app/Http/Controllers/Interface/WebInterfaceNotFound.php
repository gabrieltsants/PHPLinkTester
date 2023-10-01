<?php

namespace App\Http\Controllers\Interface;


class WebInterfaceNotFound extends WebInterface
{
    public function __construct()
    {
      parent::__construct(null);
    }

    public function validateInterfaceType(string $method): \InvalidArgumentException
    {
      throw new \InvalidArgumentException('Interface type not valid!');
    }
}

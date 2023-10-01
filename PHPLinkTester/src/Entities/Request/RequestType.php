<?php

namespace PHPLinkTester\Entities\Request;

use Stringable;

abstract class RequestType implements Stringable
{
  private string $request;

  public function __construct($request)
  {
    $this->request = NULL;

    if($this->isAValidProtocol($request))
    {
      $this->request = $request;
    }
  }

  public function __toString(): string
  {
    return $this->request;  
  }

  abstract public function isAValidProtocol($request): bool;
}
<?php

namespace PHPLinkTester\Entities\Request;

class RequestHandler
{
  public function RequestHandle(string $protocol)
  {
    $requestChain = new HttpRequest(new OtherRequest(new NotFoundRequest()));

    return $requestChain->isAValidProtocol($protocol);
  }
}
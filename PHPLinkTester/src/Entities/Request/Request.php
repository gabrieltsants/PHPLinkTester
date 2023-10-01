<?php

namespace PHPLinkTester\Entities\Request;

use PHPLinkTester\Entities\Link\Link;
use PHPLinkTester\Entities\Port\Port;

final class Request
{
  private string $requestType;

  public function __construct (private Link $link, private Port $port) { }

  public static function LinkPort(string $link, string $port): self
  {
    return new Request(new Link($link), new Port($port));
  }

  public function getLink(): string
  {
    return $this->link;
  }

  public function getPort(): string
  {
    return $this->port;
  }

  public function getRequestType(): string
  {
    return $this->requestType;
  }

  public function setRequestType(string $request): void
  {
    $this->requestType = $request;
  }
}
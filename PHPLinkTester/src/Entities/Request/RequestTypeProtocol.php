<?php

namespace PHPLinkTester\Entities\Request;

abstract class RequestTypeProtocol
{
  public function __construct(protected ?RequestTypeProtocol $nextRequest) { }
  
  abstract public function isAValidProtocol(string $requestType): array;
}
<?php

namespace PHPLinkTester\Entities\Request;

class NotFoundRequest extends RequestTypeProtocol
{
  public function __construct()
  {
    parent::__construct(null);
  }

  public function isAValidProtocol(string $requestType): array
  {
    return ['type' => '', 'protocol' => ''];
  }
}
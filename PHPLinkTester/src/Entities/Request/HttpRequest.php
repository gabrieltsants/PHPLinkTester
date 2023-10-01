<?php

namespace PHPLinkTester\Entities\Request;


class HttpRequest extends RequestTypeProtocol
{
  public function isAValidProtocol(string $protocol): array
  {
    $types = [
      'GET', 'POST', 'PATCH', 'PUT', 'DELETE'
    ];

    if (in_array($protocol, $types)) {
      return ['type' => 'Others', 'protocol' => $protocol];
    }

    return $this->nextRequest->isAValidProtocol($protocol);
  }
}
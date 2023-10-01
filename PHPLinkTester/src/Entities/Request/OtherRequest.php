<?php

namespace PHPLinkTester\Entities\Request;


class OtherRequest extends RequestTypeProtocol
{
  public function isAValidProtocol(string $protocol): array
  {
    $types = [
      'SSH', 'FTP', 'SMTP', 'POP3', 'IMAP'
    ];

    if (in_array($protocol, $types)) {
      return ['type' => 'Others', 'protocol' => $protocol];
    }

    return $this->nextRequest->isAValidProtocol($protocol);
  }
}
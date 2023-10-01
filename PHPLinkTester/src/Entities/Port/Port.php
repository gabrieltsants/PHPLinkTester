<?php

namespace PHPLinkTester\Entities\Port;

use InvalidArgumentException;
use Stringable;

final class Port implements Stringable
{
  private string $port;

  public function __construct($port)
  {
    $this->validatePort($port);
  }

  public function validatePort($port): void
  {
    if ($port < 0 || $port > 65535) {
      throw new InvalidArgumentException("Invalid port: '$port'");
    }

    $this->port = $port;
  }

  public function __toString(): string
  {
    return $this->port;
  }
}
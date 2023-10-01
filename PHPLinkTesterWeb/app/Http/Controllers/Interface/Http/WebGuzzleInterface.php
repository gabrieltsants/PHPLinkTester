<?php

namespace App\Http\Controllers\Interface\Http;

use App\Http\Controllers\Interface\WebInterface;
use PHPLinkTester\Infrastructure\Link\LinkRepositoryGuzzle;

class WebGuzzleInterface extends WebInterface
{
  public function validateInterfaceType(string $method)
  {
    if ($method === 'GUZZLE') {
      return new LinkRepositoryGuzzle();
    }

    return $this->nextInterface->validateInterfaceType($method);
  }
}

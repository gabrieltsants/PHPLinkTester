<?php

namespace App\Http\Controllers\Interface\Others;

use App\Http\Controllers\Interface\WebInterface;
use PHPLinkTester\Infrastructure\Link\LinkRepositoryfsock;

class WebFsockInterface extends WebInterface
{
  public function validateInterfaceType(string $method)
  {
    if ($method === 'FSOCK') {
      return new LinkRepositoryfsock();
    }

    return $this->nextInterface->validateInterfaceType($method);
  }
}

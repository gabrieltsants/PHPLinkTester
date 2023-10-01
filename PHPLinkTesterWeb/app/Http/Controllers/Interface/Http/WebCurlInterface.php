<?php

namespace App\Http\Controllers\Interface\Http;

use App\Http\Controllers\Interface\WebInterface;
use PHPLinkTester\Infrastructure\Link\LinkRepositoryCurl;

class WebCurlInterface extends WebInterface
{
  public function validateInterfaceType(string $method)
  {
    if ($method === 'CURL') {
      return new LinkRepositoryCurl();
    }

    return $this->nextInterface->validateInterfaceType($method);
  }
}

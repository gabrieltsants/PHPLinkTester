<?php

namespace PHPLinkTesterCLI\Controller;

use PHPLinkTester\Application\Request\RequestDto;
use PHPLinkTester\Application\Request\ValidateLinkCode;
use PHPLinkTester\Infrastructure\Link\LinkRepositoryCurl;

class LinkCLIController
{

  public function __construct(int $argCount, array $argValues)
  {
    $argsHandler = new ArgsController();

    // Self encapsulation
    if ($argCount > 0) {
      $args = $argsHandler->argsHandler($argValues);
      
      if ($argsHandler->isValidArgs($args)) {
        return $this->doRequest($args);
      }
    }
  }


  private function doRequest(array $argsValues): void
  {
    $link = $argsValues['u'];
    $dto = new RequestDto($link, $argsValues['p'], $argsValues['m']);
    $curl = new LinkRepositoryCurl();

    $useCase = new ValidateLinkCode($curl);
    $code = $useCase->execute($dto)->getCode();

    echo "Link: $link Code: $code";
  }
}
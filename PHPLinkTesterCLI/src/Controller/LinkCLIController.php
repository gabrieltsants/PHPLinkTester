<?php

namespace PHPLinkTesterCLI\Controller;

use PHPLinkTester\Application\Request\RequestDto;
use PHPLinkTester\Application\Request\ValidateLinkData;
use PHPLinkTester\Infrastructure\Link\LinkRepositoryCurl;
use PHPLinkTester\Infrastructure\Link\LinkRepositoryfsock;
use PHPLinkTester\Infrastructure\Link\LinkRepositoryGuzzle;

class LinkCLIController
{

  public function __construct(int $argCount, array $argValues)
  {
    $argsHandler = new ArgsController();

    // Self encapsulation
    if ($argCount > 0) {
      $args = $argsHandler->argsHandler($argValues);

      if (array_key_exists('h', $args)){
        $this->showHelp();
        exit;
      }
      
      if ($argsHandler->isValidArgs($args)) {
        return $this->doRequest($args);
      }
    }
  }

  private function doRequest(array $argsValues): void
  {
    $link = $argsValues['u'];
    $port = $argsValues['p'];
    $protocol = $argsValues['m'];
    $interface = $argsValues['i'];
    $dto = new RequestDto($link, $port, $protocol);

    $repository = $this->repositoryHandler($interface); 

    if (!$repository) {
      echo 'Invalid interface';
      exit;
    }

    $useCase = new ValidateLinkData($repository);
    $code = $useCase->execute($dto)->getCode();

    echo "Link: $link Code: $code" . PHP_EOL;
  }

  private function showHelp()
  {
    echo "\nUsage: PHPLinkTester.php  url=https://www.google.com port=443 method=GET interface=curl\nOr: PHPLinkTester.php  u=https://www.google.com p=443 m=GET i=curl\n"
    . PHP_EOL;
  }
  
  private function repositoryHandler($interface)
  {
    switch(strtoupper($interface)){
      case 'CURL':
        return new LinkRepositoryCurl();
      case 'GUZZLE':
        return new LinkRepositoryGuzzle();
      case 'FSOCK':
        return new LinkRepositoryfsock();
      default:
        return false;
    }
  }
}
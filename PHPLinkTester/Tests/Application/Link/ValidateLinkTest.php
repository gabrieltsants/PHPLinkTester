<?php

namespace PHPLinkTester\Tests\Application\Link;

use PHPLinkTester\Application\Request\ValidateLinkData;
use PHPLinkTester\Infrastructure\Link\LinkRepositoryCurl;
use PHPLinkTester\Application\Request\RequestDto;
use PHPLinkTester\Entities\Request\HttpRequest;
use PHPLinkTester\Entities\Request\OtherRequest;
use PHPLinkTester\Infrastructure\Link\LinkRepositoryfsock;
use PHPUnit\Framework\TestCase;

class ValidateLinkTest extends TestCase
{
  public function testValidateLinkDataCurl()
  {
    $requestDto = new RequestDto('https://www.google.com', '443', 'GET');

    $requestRepository = new LinkRepositoryCurl();

    $useCase = new ValidateLinkData($requestRepository);
    $code = $useCase->execute($requestDto);
    $this->assertSame('200', (string) $code->getCode());
  }

  public function testValidateLinkDatafsock()
  {
    $requestDto = new RequestDto('test.rebex.net:22', '443', 'SSH');

    $requestRepository = new LinkRepositoryfsock();

    $useCase = new ValidateLinkData($requestRepository);
    $code = $useCase->execute($requestDto);
    $this->assertSame('1', (string) $code->getCode());
  }
}
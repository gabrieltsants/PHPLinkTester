<?php

namespace PHPLinkTester\Tests\Application\Link;

use PHPLinkTester\Application\Request\ValidateLinkCode;
use PHPLinkTester\Infrastructure\Link\LinkRepositoryCurl;
use PHPLinkTester\Application\Request\RequestDto;
use PHPLinkTester\Entities\Request\HttpRequest;
use PHPLinkTester\Entities\Request\OtherRequest;
use PHPLinkTester\Infrastructure\Link\LinkRepositoryfsock;
use PHPUnit\Framework\TestCase;

class ValidateLinkTest extends TestCase
{
  public function testValidateLinkCodeCurl()
  {
    $requestDto = new RequestDto('https://www.google.com', '443', 'GET');

    $requestRepository = new LinkRepositoryCurl();

    $useCase = new ValidateLinkCode($requestRepository);
    $code = $useCase->execute($requestDto);
    $this->assertSame('200', (string) $code->getCode());
  }

  public function testValidateLinkCodefsock()
  {
    $requestDto = new RequestDto('test.rebex.net:22', '443', 'SSH');

    $requestRepository = new LinkRepositoryfsock();

    $useCase = new ValidateLinkCode($requestRepository);
    $code = $useCase->execute($requestDto);
    $this->assertSame('1', (string) $code->getCode());
  }
}
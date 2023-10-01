<?php

namespace PHPLinkTester\Tests\Entities\Link;

use PHPLinkTester\Entities\Link\Link;
use PHPUnit\Framework\TestCase;

class LinkTest extends TestCase
{
  public function testValidLink()
  {
    $link = new Link('https://www.test.com');
    $this->assertSame('https://www.test.com', (string) $link);
  }

  public function testInvalidLink()
  {
    $this->expectException(\InvalidArgumentException::class);
    new Link('invalidurl');
  }
}
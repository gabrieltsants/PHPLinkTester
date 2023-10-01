<?php

namespace PHPLinkTester\Entities\Link;

use Stringable;

final class Link implements Stringable
{
  private string $link;

  public function __construct($link)
  {
    $this->validateLink($link);
  }

  public function validateLink($link): void
  {
    $patternValidUrl = '/(?:https?:\/\/)?(?:[a-zA-Z0-9.-]+?\.(?:[a-zA-Z])|\d+\.\d+\.\d+\.\d+)/';

    $isAInvalidLink = !preg_match($patternValidUrl, $link);
    $isAInvalidIp = filter_var($link, FILTER_VALIDATE_IP) === false;
    
    if ($isAInvalidLink && $isAInvalidIp) {
      throw new \InvalidArgumentException("Invalid link: '$link'");
    }
    
    $this->link = $link;
  }

  public function __toString(): string
  {
    return $this->link;
  }
}
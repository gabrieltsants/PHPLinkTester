<?php

namespace PHPLinkTester\Infrastructure\Link;

use PHPLinkTester\Entities\Request\Request;
use PHPLinkTester\Entities\Request\RequestRepository;
use PHPLinkTester\Entities\Response\RequestResponse;

class LinkRepositoryfsock implements RequestRepository
{

  public function __construct(private RequestResponse $linkResponse = new RequestResponse) { }
  
  public function queryCode(Request $request): RequestResponse
  {
    $link = $request->getLink();
    $port = $request->getPort();

    $request = @fsockopen($link, $port); 
    
    if ($request) {
      $header = fgets($request);

      $this->linkResponse->setCode(1)->setHeader($header);
    }


    return $this->linkResponse;
  }
}
<?php

namespace PHPLinkTester\Infrastructure\Link;

use PHPLinkTester\Entities\Request\Request;
use PHPLinkTester\Entities\Request\RequestRepository;
use PHPLinkTester\Entities\Response\RequestResponse;
use GuzzleHttp\Client;
class LinkRepositoryGuzzle implements RequestRepository
{
  private Client $client;

  public function __construct(private RequestResponse $linkResponse = new RequestResponse)
  {
    $this->client = new Client();
  }
  
  public function queryCode(Request $request): RequestResponse
  {
    $link = $request->getLink();
    $port = $request->getPort();
    $requestType = strtolower($request->getRequestType());
    $guzzleOpt = ['http_errors' => false];

    $request = $this->client->request($requestType, $link.':'.$port, $guzzleOpt);
    
    $statusCode = $request->getStatusCode();
    
    $this->linkResponse->setCode($statusCode);

    return $this->linkResponse;
  }
}
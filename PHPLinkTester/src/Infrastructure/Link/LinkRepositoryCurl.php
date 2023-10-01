<?php

namespace PHPLinkTester\Infrastructure\Link;

use CurlHandle;
use PHPLinkTester\Entities\Request\Request;
use PHPLinkTester\Entities\Request\RequestRepository;
use PHPLinkTester\Entities\Response\RequestResponse;

class LinkRepositoryCurl implements RequestRepository
{
  private CurlHandle $client;

  public function __construct(private RequestResponse $linkResponse = new RequestResponse)
  {
    $this->client = curl_init();
  }
  
  public function queryCode(Request $request): RequestResponse
  {
    $link = $request->getLink();
    $port = $request->getPort();
    $requestType = $request->getRequestType();
    
    $curlOpt = [
      CURLOPT_URL => $link, 
      CURLOPT_PORT => $port, 
      CURLOPT_RETURNTRANSFER => 1,
      CURLOPT_CUSTOMREQUEST => $requestType,
    ];
    curl_setopt_array($this->client, $curlOpt);

    $request = curl_exec($this->client);

    if ($request) {
      $header_size = curl_getinfo($this->client, CURLINFO_HEADER_SIZE);
      $headers = substr($request, 0, $header_size);
      
      $statusCode = curl_getinfo($this->client, CURLINFO_HTTP_CODE);
      $this->linkResponse->setCode($statusCode)->setHeader($headers);
    }

    return $this->linkResponse;
  }

  public function __destruct()
  {
    curl_close($this->client);
  }
}
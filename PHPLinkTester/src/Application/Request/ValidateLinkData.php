<?php

namespace PHPLinkTester\Application\Request;

use DomainException;
use PHPLinkTester\Entities\Request\Request;
use PHPLinkTester\Entities\Request\RequestRepository;
use PHPLinkTester\Entities\Request\RequestHandler;
use PHPLinkTester\Entities\Response\RequestResponse;

class ValidateLinkData
{
  public function __construct (private RequestRepository $requestRepository) { }

  public function execute(RequestDto $requestData): RequestResponse
  {
    $request = Request::LinkPort (
      $requestData->link, 
      $requestData->port,
    );

    $RequestHandler = new RequestHandler;
    $findRequestMethod = $RequestHandler->RequestHandle($requestData->protocol);

    if (empty($findRequestMethod['type'])) {
      throw new DomainException("Invalid request method: '$requestData->protocol'");
    }

    $request->setRequestType($requestData->protocol);
    return $this->requestRepository->queryCode($request);
  }
}

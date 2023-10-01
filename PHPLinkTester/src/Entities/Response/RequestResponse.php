<?php

namespace PHPLinkTester\Entities\Response;

use ArrayIterator;

final class RequestResponse implements \IteratorAggregate
{
  private array $linkResponses = [];
  private string $code;
  private string $header;
  private string $message;

  public function __construct()
  {
    $this->code = 0;
    $this->header = '';
  }

  static function codeHeaderMessage(string $code, string $header, string $message): self
  {
    $linkResponse = new RequestResponse();
    $linkResponse->setCode($code)->setHeader($header)->setMessage($message);
    
    return $linkResponse;
  }

  public function getCode(): string
  {
    return $this->code;
  }

  public function getHeader(): string
  {
    return $this->header;
  }

  public function getMessage(): string
  {
    return $this->message;
  }
  
  public function setCode($code): self
  {
    $this->code = $code;

    return $this;
  }

  public function setHeader(string $header): self
  {
    $this->header = $header;

    return $this;
  }

  public function setMessage($message): self
  {
    $this->message = $message;

    return $this;
  }

  public function setResponse($statusCode, $message): void
  {
    array_push($this->linkResponses, array ('status' => $statusCode, 'message' => $message));
  }

  public function getIterator(): \ArrayIterator
  {
    return new ArrayIterator($this->linkResponses);
  }
}
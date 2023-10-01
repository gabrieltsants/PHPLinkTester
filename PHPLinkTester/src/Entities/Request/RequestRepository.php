<?php

namespace PHPLinkTester\Entities\Request;

use PHPLinkTester\Entities\Response\RequestResponse;

interface RequestRepository
{
  public function queryCode(Request $request): RequestResponse;
}
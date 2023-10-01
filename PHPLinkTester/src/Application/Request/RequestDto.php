<?php

namespace PHPLinkTester\Application\Request;

class RequestDto
{
    public function __construct (
        public string $link, 
        public string $port, 
        public string $protocol
    ) { }
}

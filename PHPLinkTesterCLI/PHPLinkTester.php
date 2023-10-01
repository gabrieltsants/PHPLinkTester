<?php
use PHPLinkTesterCLI\Controller\LinkCLIController;

require 'vendor/autoload.php';

return new LinkCLIController($argc, $argv);
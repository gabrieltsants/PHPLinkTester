#!/bin/bash

cd $(dirname "$0");

cd PHPLinkTester && composer install && composer dumpautoload;
cd ../PHPLinkTesterWeb && composer install && composer dumpautoload;

echo "Script finished";
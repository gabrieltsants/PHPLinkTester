<?php

namespace PHPLinkTesterCLI\Controller;

class ArgsController
{
  private array $requiredArgs = ['u', 'p', 'm', 'i'];

  public function argsHandler(array $argValues): array
  {
    // Check if any argument were passed
      foreach ($argValues as $arg) {
        $e=explode("=",$arg);
        if (count($e)==2) { $args[$e[0]]=$e[1]; }
        else { $args[$e[0]]=0; }  
      }

      // Change all args to first letter only
      $args = array_reduce(array_keys($args), function ($result, $key) use ($args) {
        $newKey = substr($key, 0, 1);
        $result[$newKey] = $args[$key];
        return $result;
      }, []);

      return $args;
  }

  public function isValidArgs(array $argsValues): bool
  {
    // Check if all required arguments exist
    if (count(array_intersect_key(array_flip($this->requiredArgs), $argsValues)) < count($this->requiredArgs)) {
      $this->throwMessage("Missing arguments");

      return false;
    }

    return true;
  }

  private function  throwMessage(string $text): void
  {
    echo $text . PHP_EOL;
  }
}
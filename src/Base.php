<?php
namespace App\src;

class Base
{
    protected function help(string $error = null)
    {
        print $error;
        $o = (!is_null($error)) ? "\033[31m[ERROR] {$error}\033[0m" : '';
        $o .= "Usage: shell> cipher -s 'Secret string' -t 8\n\n";
        $o .= "-s         String that you want to hash\n";
        $o .= "-k         Cipher key";
        $o .= "\n\n";
        $o .= "--string   String that you want to hash\n";
        $o .= "--key      Cipher key";
        $o .= "Help page \n";
        die($o);
    }
}
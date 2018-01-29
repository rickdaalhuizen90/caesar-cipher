<?php
namespace App\src;

class Base
{
    protected function help(string $error = null)
    {
        $o = (!is_null($error)) ? "\033[31m[ERROR] {$error}\033[0m" : '';
        $o .= "\033[33mCaesar Cipher - help page\n";
        $o .= "Author: github.com/rickdaalhuizen90\n";
        $o .= "\n";
        $o .= "Usage:   shell> cipher -s \"Hello world!\" -k 12\n";
        $o .= "OR:      shell> cipher --string \"Hello world!\" --key 12\n";
        $o .= "Output:  shell> Encrypted: Tqxxa iadxp! \n\n\033[0m";
        $o .= "-s         String that you want to hash\n";
        $o .= "-k         Cipher key\n";
        $o .= "-h         Help page\n";
        $o .= "-D         Decrypt message";
        $o .= "\n\n";
        $o .= "--string   String that you want to hash\n";
        $o .= "--key      Cipher key\n";
        $o .= "--help     Help page\n";
        $o .= "--decrypt  Decrypt message\n";
        die($o);
    }
}

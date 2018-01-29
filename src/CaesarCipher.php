<?php

class CaesarCipher extends App\src\Base
{

    protected $string;
    protected $key;
    protected $decrypt = false;

    /**
     * Init arguments
     * @param array $argv   cli arguments
     * @param int $argc     arguments count
     */
    public function __construct(array $argv, int $argc)
    {
        $this->parseArgs($argv, $argc);
    }

    /**
     * Parse arguments
     * @param  array $argv  arguments
     * @param int $argc     argument count
     * @return void         exit if arguments are null
     */
    protected function parseArgs(array $argv, int $argc)
    {
        array_shift($argv); // Remove argv[0] from the arguments

        $short_opts = 's:k:Dh';
        $long_opts = array('string:', 'key:', 'decrypt', 'help');
        $options = getopt($short_opts, $long_opts);

        foreach(array_keys($options) as $opt){

            if ($opt === 'D' || $opt === 'decrypt') $this->decrypt = true;

            // If an argument is being passed twice, use the first argument
            if ($opt === 's' || $opt === 'string')
                $this->string = is_array($options[$opt]) ? $options[$opt][0] : $options[$opt];

            if ($opt === 'k' || $opt === 'key')
                $this->key = is_array($options[$opt]) ? $options[$opt][0] : $options[$opt];

            if ($opt === 'h' || $opt === 'help') $this->help();
        }

        try {
            if (is_null($this->string)) throw new Exception("String can't be null!\n");
            if (is_null($this->key)) throw new Exception("Key can't be null!\n");
            if (!is_numeric($this->key)) throw new Exception("Key should be numeric!\n");
            if ($argc > ((!$this->decrypt) ? 5 : 6)) throw new Exception("To many arguments!\n");

        } catch(Exception $e) {
            die($this->help($e->getMessage()));
        }
    }

    /**
     * Step 1. ord($char) + $key e.g. Get the character with its ASCII value, added with the cipher key | e.g. ord('a') + 2 = 99
     * Step 2. Offset: ASCII value of 'A' if it's uppercase and 'a' if it's lowercase
     * Step 3. Substract the offset from step 1 | e.g. (ord('a') + 2) - 97 = 2
     * Step 4. Get the modulo of of the division of: The result of step 3 and 26 | e.g. (fmod((ord('a') + 2) - 97, 26)) + 97 = 99
     * Step 5. Get the specific character from the result of step 4 added with the offset ASCII value
     *
     * @param  string $char single character
     * @param  string $key  cipher key
     * @return string       Returns a one-character string containing the character specified by ascii.
     */
    protected function shift(string $char, int $key)
    {
        if (!ctype_alpha($char)) return $char;

        // Return the ASCII value of 'A' if it's uppercase and 'a' if it's lowercase
        $offset = ord(ctype_upper($char) ? 'A' : 'a');
        return chr(fmod(((ord($char) + $key) - $offset), 26) + $offset);
    }

    /**
     * Encrypt string to Caesar cipher
     * @param  string $string   message you want to encrypt
     * @param  int    $key      cipher key
     * @return string           encrypted message
     */
    protected function encrypt(string $string, int $key)
    {
        $chars = str_split($string);
        $output = "";

        foreach ($chars as $char)
            $output .= $this->shift($char, $key);

        return $output;
    }

    /**
     * Decrypt Caesar cipher    message
     * @param  string $string   message you want to decrypt
     * @param  int    $key      cipher key
     * @return string           decrypted message
     */
    protected function decrypt(string $string, int $key)
    {
        return $this->encrypt($string, 26 - $key);
    }

    /**
     * Run script
     * @return void print result
     */
    public function run()
    {
        print (!$this->decrypt)
            ? "Encrypted: {$this->encrypt($this->string, $this->key)}"
            : "Decrypted: {$this->decrypt($this->string, $this->key)}";
    }
}
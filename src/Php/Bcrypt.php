<?php

namespace App\Php;

class Bcrypt
{

    public function verify(array $config)
    {
        echo "Pass: " . $config['pas'] . PHP_EOL;

        $hashed = file_get_contents($config['res'] . DIRECTORY_SEPARATOR . "hashBcrypt.txt");
        echo "Hashed: $hashed" . PHP_EOL;

        $isValid = password_verify($config['pas'], $hashed) ? "true" : "false";
        echo "Verified: $isValid" . PHP_EOL;
    }

    public function hash(array $config)
    {
        echo "Pass: " . $config['pas'] . PHP_EOL;
        $hashed = password_hash($config['pas'], PASSWORD_BCRYPT, ['cost' => 10]);
        echo "Hashed: $hashed" . PHP_EOL;
        file_put_contents($config['res'] . DIRECTORY_SEPARATOR . "hashBcrypt.txt", $hashed);
    }
}
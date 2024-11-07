<?php

namespace App\UseCases;

use App\Php\Crypto;

class CryptoDecryptWithPHP
{
    public function run(string $e)
    {
        $c = new Crypto();
        $config = [
            'alg' => 'aes-128-ctr',
            'key' => 'lbwyBzfgzUIvXZFShJuikaWvLJhIVq36'
        ];
        $plainText = $c->decrypt([
            "alg" => $config['alg'],
            "key" => $config['key'],
            "ciphered" => $e
        ]);
        return $plainText;
    }
}
<?php

namespace App\UseCases;

use App\Php\Crypto;

class CryptoEncryptWithPHP
{
    public function run(): string
    {
        $config = [
            'alg' => 'aes-128-ctr',
            'key' => 'lbwyBzfgzUIvXZFShJuikaWvLJhIVq36',
        ];
        return (new Crypto())->encrypt([
            "alg" => $config['alg'],
            "key" => $config['key'],
            "text" => "text to be encrypted (php)"
        ]);
    }
}
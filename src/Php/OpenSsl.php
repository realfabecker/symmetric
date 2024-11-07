<?php

namespace App\Php;

class OpenSsl
{
    public function newKeyPair()
    {
        $config = [
            'digest_alg' => "sha256",
            'private_key_bits' => 2048,
            'private_key_type' => OPENSSL_KEYTYPE_RSA
        ];
        $keys = openssl_pkey_new($config);
        openssl_pkey_export($keys, $privateKey);
        $publicKey = openssl_pkey_get_details($keys)["key"];
        return [$privateKey, $publicKey];
    }

    public function sign(
        string $content, 
        string $privateKey, 
        int $algo = OPENSSL_ALGO_SHA256
    ) {
        openssl_sign($content, $signature, $privateKey, $algo);
        return bin2hex($signature);
    }

    public function verify(
        string $content,
        string $signature,
        string $publicKey,
        int $algo = OPENSSL_ALGO_SHA256
    ) {
        return openssl_verify($content, hex2bin($signature), $publicKey, $algo);
    }
}
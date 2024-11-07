<?php

namespace App\Php;

class Crypto
{
    /**
     * @param array{text:string,key:string,alg:string} $params
     * @return string
     */
    public function encrypt(array $params)
    {
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($params['alg']));
        $chipertext = openssl_encrypt($params['text'], $params['alg'], $params['key'], OPENSSL_RAW_DATA, $iv);
        return bin2hex($iv) . ":" . bin2hex($chipertext);
    }

    /**
     * @param array{ciphered:string, key:string, alg:string} $params
     * @return false|string
     */
    public function decrypt(array $params)
    {
        [$iv_hex, $ciphertext_hex] = explode(":", $params["ciphered"]);
        $iv = hex2bin($iv_hex);
        $ciphertext = hex2bin($ciphertext_hex);
        return openssl_decrypt($ciphertext, $params['alg'], $params["key"], OPENSSL_RAW_DATA, $iv);
    }
}
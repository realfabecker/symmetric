<?php

/**
 * @param array{text:string,key:string,alg:string} $params
 * @return string
 */
function encrypt(array $params)
{
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($params['alg']));
    $chipertext = openssl_encrypt($params['text'], $params['alg'], $params['key'], OPENSSL_RAW_DATA, $iv);
    return bin2hex($iv) . ":" . bin2hex($chipertext);
}

/**
 * @param array{ciphered:string, key:string, alg:string} $params
 * @return false|string
 */
function decrypt(array $params)
{
    [$iv_hex, $ciphertext_hex] = explode(":", $params["ciphered"]);
    $iv = hex2bin($iv_hex);
    $ciphertext = hex2bin($ciphertext_hex);
    return openssl_decrypt($ciphertext, $params['alg'], $params["key"], OPENSSL_RAW_DATA, $iv);
}

try {
    $config = [
        'alg' => 'aes-128-ctr',
        'key' => 'lbwyBzfgzUIvXZFShJuikaWvLJhIVq36',
        'res' => implode(DIRECTORY_SEPARATOR, [__DIR__, "..", "resources", "secrets"]),
    ];

    $encrypted = encrypt([
        "alg" => $config['alg'],
        "key" => $config['key'],
        "text" => "text to be encrypted (php)"
    ]);
    echo "Encrypted: $encrypted" . PHP_EOL;
    file_put_contents($config['res'] . DIRECTORY_SEPARATOR . $config['alg'] . "_php.txt", $encrypted);

    $decrypted = decrypt([
        "alg" => $config['alg'],
        "key" => $config['key'],
        "ciphered" => $encrypted
    ]);
    echo "Decrypted: $decrypted" . PHP_EOL;

    if (is_file($config['res'] . DIRECTORY_SEPARATOR . $config['alg'] . "_js.txt")) {
        $encrypted = file_get_contents($config['res'] . DIRECTORY_SEPARATOR . $config['alg'] . "_js.txt");
        $decrypted = decrypt([
            "alg" => $config['alg'],
            "key" => $config['key'],
            "ciphered" => $encrypted
        ]);
        echo "Decrypted: $decrypted" . PHP_EOL;
    }
} catch (\Throwable $e) {
    echo $e->getMessage();
    exit(1);
}

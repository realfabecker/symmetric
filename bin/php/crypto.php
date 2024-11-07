<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use App\UseCases\CryptoEncryptWithPHP;

$encryptUseCase = new CryptoEncryptWithPHP();
$encryptedText = $encryptUseCase->run();

echo "Encrypted: $encryptedText" . PHP_EOL;
$res = new \App\Php\Resource();
$res->store('secrets/aes-128-ctr_php.txt', $encryptedText);

$decryptUserCase= new \App\UseCases\CryptoDecryptWithPHP();
$decryptedText = $decryptUserCase->run($encryptedText);
echo "Decrypted: $decryptedText" . PHP_EOL;

$nodeEncryptedText= $res->read('secrets/aes-128-ctr_nodejs.txt');
if ($nodeEncryptedText) {
    $nodeDecryptedText = $decryptUserCase->run($nodeEncryptedText);
    echo "Decrypted: $nodeDecryptedText" . PHP_EOL;
}
<?php

require_once __DIR__ . '/../../vendor/autoload.php';

// $openSslKeyGenerateKeyParir = new \App\UseCases\OpenSslGenerateKeyPair();
// [$privateKey, $publicKey] = $openSslKeyGenerateKeyParir->run();

//$openSslSignAndVerify = new \App\UseCases\OpenSslSignAndVerifyInPHP();
//$openSslSignAndVerify->run($privateKey, $publicKey);

$openSslVerifyNodeSignInPhp = new \App\UseCases\OpenSslVerifyNodeSignInPHP();
$openSslVerifyNodeSignInPhp->run();
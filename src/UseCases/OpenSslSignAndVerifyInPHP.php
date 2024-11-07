<?php

namespace App\UseCases;

use App\Php\OpenSsl;
use App\Php\Resource;

class OpenSslSignAndVerifyInPHP
{
    public function run(string $privateKey, string $publicKey, $content = 'Hello from PHP!')
    {
        $openSsl = new OpenSsl();
        $signature = $openSsl->sign($content, $privateKey);
        echo "Signed: " . $signature . PHP_EOL;

        $verifiedStatus = $openSsl->verify($content, $signature, $publicKey);
        echo "Verification ($verifiedStatus)" . PHP_EOL;

        if ($verifiedStatus) {
            $res = new Resource();
            $res->store('content/content.php.txt', $content);
            $res->store('content/content.php.sig.txt', $signature);
        }

        return [$content, $signature, $verifiedStatus];
    }
}
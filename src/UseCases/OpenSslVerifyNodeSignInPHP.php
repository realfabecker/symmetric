<?php

namespace App\UseCases;

use App\Php\OpenSsl;
use App\Php\Resource;

class OpenSslVerifyNodeSignInPHP
{
    public function run()
    {
        $res = new Resource();
        $publicKey = $res->read('keys/public.pem');
        $content = $res->read('content/content.nodejs.txt');
        $signature = $res->read('content/content.nodejs.sig.txt');
        
        $openSsl = new OpenSsl();
        $verifyStatus = $openSsl->verify($content, $signature, $publicKey);
        echo "Verification: ($verifyStatus)" . PHP_EOL;
    }
}

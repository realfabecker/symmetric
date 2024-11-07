<?php

namespace App\UseCases;

use App\Php\OpenSsl;
use App\Php\Resource;

class OpenSslVerifyNodeSignInPHP
{
    public function run()
    {
        $res = new Resource();
        if(!$res->exists('keys/public.pem')) {
            throw new \Exception("Public key not found");
        }
        $publicKey = $res->read('keys/public.pem');

        if(!$res->exists('content/content.nodejs.txt')) {
            throw new \Exception("Content not found");
        }
        $content = $res->read('content/content.nodejs.txt');

        if(!$res->exists('content/content.nodejs.sig.txt')) {
            throw new \Exception("Signature not found");
        }
        $signature = $res->read('content/content.nodejs.sig.txt');
        
        $openSsl = new OpenSsl();
        $verifyStatus = $openSsl->verify($content, $signature, $publicKey);
        echo "Verification: ($verifyStatus)" . PHP_EOL;
    }
}

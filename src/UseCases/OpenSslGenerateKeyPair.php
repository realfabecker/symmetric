<?php

namespace App\UseCases;

use App\Php\OpenSsl;
use App\Php\Resource;

class OpenSslGenerateKeyPair
{
    public function run()
    {
        $openSsl = new OpenSsl();
        [$privateKey, $publicKey] = $openSsl->newKeyPair();
        $res = new Resource();
        $res->store('keys/private.pem', $privateKey);
        $res->store('keys/public.pem', $publicKey);
        return [$privateKey, $publicKey];
    }
}
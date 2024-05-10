<?php

$config = [
    'pas' => 'abcx210',
    'res' => implode(DIRECTORY_SEPARATOR, [__DIR__, "..", "resources", "secrets"]),
];

function xverify(array $config)
{
    echo "Pass: " . $config['pas'] . PHP_EOL;
    
    $hashed = file_get_contents($config['res'] . DIRECTORY_SEPARATOR . "hashBcrypt.txt");
    echo "Hashed: $hashed" . PHP_EOL;

    $isValid = password_verify($config['pas'], $hashed) ? "true" : "false";
    echo "Verified: $isValid" . PHP_EOL;
}

function xhash(array $config)
{
    echo "Pass: " . $config['pas'] . PHP_EOL;
    $hashed = password_hash($config['pas'], PASSWORD_BCRYPT, ['cost' => 10]);
    echo "Hashed: $hashed" . PHP_EOL;
    file_put_contents($config['res'] . DIRECTORY_SEPARATOR . "hashBcrypt.txt", $hashed);
}

try {
    
    if(!$opr = $argv[1] ?? null) {
        echo "err: opr is required" . PHP_EOL;
        exit(1);
    }
    
    switch ($opr) {
        case 'verify':
            xverify($config);
            break;
        case 'hash':
            xhash($config);
            break;
        default:
            echo "err: invalid opr";
            exit(1);
    };
    
}catch (\Throwable $t){
    echo $t->getMessage();
    exit(1);
}
<?php

namespace App\Php;

class Resource
{
    public function read(string $id)
    {
        $res = implode(DIRECTORY_SEPARATOR, [__DIR__, "..", "..", "resources"]);
        return file_get_contents(implode(DIRECTORY_SEPARATOR, [$res, $id]));
    }

    public function exists(string $id)
    {
        $res = implode(DIRECTORY_SEPARATOR, [__DIR__, "..", "..", "resources"]);
        return file_exists(implode(DIRECTORY_SEPARATOR, [$res, $id]));
    }
    
    public function store(string $id, string $data)
    {
        $res = implode(DIRECTORY_SEPARATOR, [__DIR__, "..", "..", "resources"]);
        return file_put_contents(implode(DIRECTORY_SEPARATOR, [$res, $id]), $data);
    }
}
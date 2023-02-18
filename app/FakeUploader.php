<?php


class FakeUploader implements \FileUploader
{

    public function __construct($client = null, $config = [])
    {
    }

    function store($file, $filename): \ArrayAccess
    {
        // TODO: Implement store() method.
    }

    function delete($url)
    {
        // TODO: Implement delete() method.
    }
}
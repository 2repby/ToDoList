<?php

namespace FileUploader;

class FakeUploader implements FileUploader
{

    public function __construct($client = null, $config = [])
    {
    }

    function store($file, $filename)
    {
        // TODO: Implement store() method.
    }
}
<?php

namespace FileUploader;

interface FileUploader
{
    function __construct($client = null, $config = []);
    function store($file, $filename);
    function delete($url);
}
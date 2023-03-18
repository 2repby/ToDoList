<?php
namespace App;

interface FileUploader
{
    function store($file, $filename): \ArrayAccess;
    function delete($url);
}
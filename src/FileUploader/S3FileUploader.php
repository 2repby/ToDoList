<?php

namespace FileUploader;

class S3FileUploader implements FileUploader
{
    private  $s3client;

    function __construct($client = null, $config = [])
    {
        $this->s3client = $client;
    }

    function store($file, $filename)
    {
        return $this->s3client->putObject([
            'Bucket' =>  $_ENV['S3_BUCKET'],
            'Key' => $_ENV['S3_KEY'] . '/' . $filename,
            'Body' => $file]);
    }

    function delete($url)
    {
        $filename = explode('/', $url);
        $filename = $filename[count($filename) - 1];
        return $this->s3client->deleteObject([
            'Bucket' => $_ENV['S3_BUCKET'],
            'Key' => $_ENV['S3_KEY'] . '/' . $filename,
        ]);
    }
}
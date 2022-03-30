<?php

namespace S3FileUploader;

use FileUploader\FileUploader;

class S3FileUploader implements FileUploader
{
    private  $s3client;

    function __construct($client = null, $config = [])
    {
        $this->s3client = $client;
    }
    function store($file)
    {
        return $this->s3client->putObject(['Bucket' =>  $_ENV['S3_BUCKET'],'Key' => $_ENV['S3_KEY'] . '/file' . rand(100000, 999999) . '.' . 'ext', 'Body' => $file]);
//        return $this->s3client->putObject([
//            'Bucket' =>  $_ENV['S3_BUCKET'], //чтение настроек окружения из файла .env
//            //генерация случайного имени файла
//            'Key' => $_ENV['S3_KEY'] . '/file' . rand(100000, 999999) . '.' . $ext,
//            'Body' => $file
//        ]);
    }

}
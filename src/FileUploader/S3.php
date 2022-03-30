<?php

namespace FileUploader;

use Aws\S3\S3Client;

class S3
{
    private $client;

    public function __construct(){
        $this->client = new S3Client([
            'version' => 'latest',
            'region' => 'us-east-1',
            'endpoint' => $_ENV['S3_ENDPOINT'], //чтение настроек окружения из файла .env
            'use_path_style_endpoint' => true,
            'credentials' => [
                'key' => $_ENV['S3_KEY'],
                'secret' => $_ENV['S3_SECRET'],
            ],
        ]);
    }

    public function getClient(){
        return $this->client;
    }

}
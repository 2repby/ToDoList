<?php

use Aws\S3\S3Client;

class Container
{
    public static function getS3Client(): S3Client
    {
        $config = self::getS3Config();
        return new S3Client([
            'version' => $config->getVersion(),
            'region' => $config->getRegion(),
            'endpoint' => $config->getEndpoint(),
            'use_path_style_endpoint' => true,
            'credentials' => [
                'key' => $config->getKey(),
                'secret' => $config->getSecret(),
            ],
        ]);
    }

    public static function getS3Config(): \S3ClientConfig
    {
        return new \S3ClientConfig($_ENV['S3_BUCKET'],$_ENV['S3_ENDPOINT'], 'us-east-1', $_ENV['S3_KEY'],$_ENV['S3_SECRET'],'latest');

    }

    public static function getFileUploader(): FileUploader
    {
        return self::getS3FileUploader();
    }

    public static function getS3FileUploader(): \S3FileUploader
    {
        return new \S3FileUploader(self::getS3Client(),self::getS3Config());
    }

    public static function getLocalFileUploader(): \LocalFileUploader
    {
        return new \LocalFileUploader();
    }
}
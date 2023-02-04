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
        return new \S3ClientConfig($_ENV['S3_BUCKET'],$_ENV['S3_ENDPOINT'], $_ENV['S3_REGION'], $_ENV['S3_KEY'],$_ENV['S3_SECRET'],$_ENV['S3_VERSION']);

    }

    public static function getFileUploader(): FileUploader
    {
        return self::getS3FileUploader();
        //Для изменения технологии работы с файлами поменять метод
        //return self::getLocalFileUploader();
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
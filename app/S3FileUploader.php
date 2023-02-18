<?php


use Aws\S3\S3Client;

class S3FileUploader implements FileUploader
{
    private S3Client $s3client;
    private S3ClientConfig $s3config;

    public function __construct(S3Client $s3client, S3ClientConfig $s3config)
    {
        $this->s3client = $s3client;
        $this->s3config = $s3config;
    }


    public function store($file, $filename): \ArrayAccess
    {
        return $this->s3client->putObject([
            'Bucket' =>  $this->s3config->getBucket(),
            'Key' => $this->s3config->getKey() . '/' . $filename,
            'Body' => $file]);
    }

    public function delete($url)
    {
        $filename = explode('/', $url);
        $filename = $filename[count($filename) - 1];
        return $this->s3client->deleteObject([
            'Bucket' => $this->s3config->getBucket(),
            'Key' => $this->s3config->getKey() . '/' . $filename,
        ]);
    }
}
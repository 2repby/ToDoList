<?php


class S3ClientConfig
{
    private string $bucket;
    private string $endpoint;
    private string $region;
    private string $key;
    private string $secret;
    private string $version;

    /**
     * @param string $bucket
     * @param string $endpoint
     * @param string $region
     * @param string $key
     * @param string $secret
     * @param string $version
     */
    public function __construct(string $bucket, string $endpoint, string $region, string $key, string $secret, string $version)
    {
        $this->bucket = $bucket;
        $this->endpoint = $endpoint;
        $this->region = $region;
        $this->key = $key;
        $this->secret = $secret;
        $this->version = $version;
    }

    /**
     * @return string
     */
    public function getBucket(): string
    {
        return $this->bucket;
    }

    /**
     * @return string
     */
    public function getEndpoint(): string
    {
        return $this->endpoint;
    }

    /**
     * @return string
     */
    public function getRegion(): string
    {
        return $this->region;
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @return string
     */
    public function getSecret(): string
    {
        return $this->secret;
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }
}
<?php

namespace FileUploader;

class UploadService
{
    private $uploader;

    function __construct($fileUploader){
        $this->uploader = $fileUploader;
    }

    public function upload($file, $filename)
    {
        return $this->uploader->store($file, $filename);
    }

    public function delete($url)
    {
        return $this->uploader->delete($url);
    }
};
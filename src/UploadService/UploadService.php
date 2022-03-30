<?php

namespace UploadService;

use FileUploader;

class UploadService
{
    private $uploader;
    function __construct($fileUploader){
        $this->uploader = $fileUploader;

    }

    public function upload($file)
    {
        return $this->uploader->store($file);
    }
};
<?php

class Uploader
{
    private $filename;
    private $fileData;
    private $destination;
    private $errorMessage;
    private $errorCode;

    public function __construct($key)
    {
        $this->filename= $_FILES[$key]['name'];
        $this->fileData= $_FILES[$key]['tmp_name'];
        $this->errorCode=($_FILES[$key]['error']);
    }
    
    private function readyToUpload(){
        $folderIsWritable = is_writable($this->destination);
        if ($folderIsWritable === false){
            $this->errorMessage= "Error: destination folder is ";
            $this->errorMessage .= "not writable, change permissions";
            $canUpload= false;
        } else {
            $canUpload= true;
        }
        return $canUpload;
    }
    public function save(){
        if ($this->readyToUpload()){
            move_uploaded_file(
                $this->fileData,
                "$this->destination/$this->filename"
            );
        } else {
            $exc= new Exception($this->errorMessage);
            throw $exc;
        }
    }
    public function saveIn($folder){
        $this->destination = $folder;
    }
}
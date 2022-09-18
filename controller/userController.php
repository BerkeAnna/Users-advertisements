<?php
require_once('model/upload.php');

class userController
{
    public $name, $title;

    public function __construct($name, $title)
    {
        $this->name = $name;
        $this->title = $title;

        $upload = new upload($this->name, $this->title);
        $upload->uploadUser();

    }


}
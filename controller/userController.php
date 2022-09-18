<?php
require_once('model/uploadU.php');

class userController
{
    public $name, $title;

    public function __construct($name, $title)
    {
        $this->name = $name;
        $this->title = $title;

        $upload = new uploadU($this->name, $this->title);
        $upload->uploadUser();

    }


}
<?php
require_once('controller/connection.php');
require_once('model/user.php');
require_once('model/advertisement.php');

class upload
{

    public $name;
    public $title;

    public function __construct($cname, $ctitle)
    {
        $this->name = $cname;
        $this->title = $ctitle;

    }

    function connect()
    {
        $ConnectionClass = new connection();
        $Connection = $ConnectionClass->connection();
        return $Connection;
    }

    function uploadUser()
    {
        $conn = $this->connect();
        $sql = 'SELECT name FROM `users-advertisements`.users';
        $res = mysqli_query($conn, $sql);

        $names = array();
//tömmbe rakja a neveket
        while ($row = mysqli_fetch_assoc($res)) {
            array_push($names, $row['name']);
        }

        $userIsExist = false;

        for ($i = 0; $i < count($names); $i++) {
            echo $names[$i] . ' ';
            if ($this->name == $names[$i]) {
                $userIsExist = true;
            }
        }


        if (!$userIsExist) {
            $newUser = new user($this->name);
            $newUser->uploadNewUser();
            $this->uploadAds();

        } else {
            $this->uploadAds();
        }

    }

    function uploadAds()
    {
        $newAd = new advertisement($this->name, $this->title);
        $newAd->add();
    }


}
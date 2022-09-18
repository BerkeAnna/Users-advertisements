<?php
require_once('controller/connection.php');
require_once('model/addNewUser.php');
require_once('model/addNewAdvertisement.php');
class uploadU
{

    public $name;
    public $title;

    public function __construct($cname, $ctitle){
        $this->name = $cname;
        $this->title = $ctitle;

    }

    function connect(){
        $ConnectionClass= new connection();
        $Connection= $ConnectionClass->connection();
        return $Connection;
    }

    function uploadUser(){
        $conn=$this->connect();
        $sql = 'SELECT name FROM `users-advertisements`.users' ;
        $res = mysqli_query($conn, $sql);

        $names=array();
//tömmbe rakja a neveket
        while ($row = mysqli_fetch_assoc($res) ) {
            array_push($names, $row['name']);
        }

        $userIsExist=false;
//ha nincs a tömmben false maard
        for ($i=0; $i<count($names); $i++){
            echo $names[$i] . ' ';
            if($this->name == $names[$i]){
                $userIsExist=true;
            }
        }


//ha false akkor meghívja

        if(!$userIsExist) {
            $newUser = new addNewUser($this->name);
            $newUser->uploadNewUser();
//       $this->uploadAds();
            $newAd = new addNewAdvertisement($this->name, $this->title);
            $newAd->add();
        }else {
//        $this->uploadAds();
            $newAd = new addNewAdvertisement($this->name, $this->title);
            $newAd->add();
        }

    }

    function uploadAds(){
        $newAd = new addNewAdvertisement($this->name, $this->title);
        $newAd->add();
    }



}
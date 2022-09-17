<?php
require_once ('connect.php');
require_once ('addNewUser.php');
require_once ('addNewAdvertisement.php');
class uploadU
{

    public $name;
    public $title;

    public function __construct($cname, $ctitle){
        $this->name = $cname;
        $this->title = $ctitle;

    }

function connect(){
    $ConnectionClass= new connect();
    $Connection= $ConnectionClass->connect();
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
       $this->uploadAds();
    }else {
        $this->uploadAds();
    }

}

function uploadAds(){
    $newAd = new addNewAdvertisement($this->name, $this->title);
    $newAd->add();
}



}
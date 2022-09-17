<?php

class addNewAdvertisement
{
    public $name;
    public $title;

    public function __construct($username, $adtitle){
        $this->name=$username;
        $this->title=$adtitle;
    }

    function connect(){
        $connectionClass= new connect();
        $connection= $connectionClass->connect();
        return $connection;
    }

    function countNewId(){
        $conn=$this->connect();
        $sql="SELECT count(*) as db FROM `users-advertisements`.advertisements;";
        $res = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($res) ) {
            echo 'db: ' . $row["db"];
            $countID=$row["db"]+1;
        }
        return $countID;
    }

    function searchUserId(){
        $conn=$this->connect();
        $sqlUser = 'SELECT id, name FROM `users-advertisements`.users';
        $resUser = mysqli_query($conn, $sqlUser);

        $names=array();
        $uID=array();
        $userID=0;

        while ($row = mysqli_fetch_assoc($resUser) ) {
            array_push($names, $row['name']);
            array_push($uID, $row['id']);
        }

        $userIsExist=false;
        for ($i=0; $i<count($names); $i++) {
            echo $names[$i] . ' ';
            if ($this->name == $names[$i]) {
                $userID = $i + 1;
            }
        }
        echo 'USERID:' . $userID;
        return $userID;
    }

    public function add(){
        $conn=$this->connect();
        $userID=$this->searchUserId();
        $countID=$this->countNewId();
        $stmt = mysqli_prepare( $conn,"insert into `users-advertisements`.advertisements(id, userid, title) VALUES (?,?,?)");

        mysqli_stmt_bind_param($stmt, 'iis', $countID, $userID, $this->title);

        mysqli_stmt_execute($stmt);
    }




}
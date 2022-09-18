<?php

require_once ('controller/connection.php');
class user
{
    public $name;

    public function __construct($username){
        $this->name=$username;
    }

    function connect(){
        $connectionClass= new connection();
        $connection= $connectionClass->connection();
        return $connection;
    }

    function countNewId(){
        $conn=$this->connect();
        $sql="SELECT count(*) as db FROM `users-advertisements`.users;";
        $res = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($res) ) {
            echo 'db: ' . $row["db"];
            $countID=$row["db"]+1;
        }
        return $countID;
    }

    function uploadNewUser(){
        $countID=$this->countNewId();
        $conn=$this->connect();
        $stmt = mysqli_prepare( $conn,"INSERT INTO `users-advertisements`.users (id, name) VALUES (?,?)");


        mysqli_stmt_bind_param($stmt, 'is', $countID, $this->name);

        mysqli_stmt_execute($stmt);
    }

}
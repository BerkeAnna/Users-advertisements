<?php
include_once('connection.php');

function addNewAdversitement($name, $title){
    $conn=connect();

    $userID=0;
    $sqlUser = 'SELECT id, name FROM `users-advertisements`.users';
    //$sqlUserId = 'SELECT id FROM `users-advertisements`.users';
    $resUser = mysqli_query($conn, $sqlUser);
//    $resUserId = mysqli_query($conn, $sqlUserId);

    $names=array();
    $uID=array();
//tömmbe rakja a neveket
    while ($row = mysqli_fetch_assoc($resUser) ) {
        array_push($names, $row['name']);
        array_push($uID, $row['id']);
    }

    $userIsExist=false;
//ha nincs a tömmben false maard
    for ($i=0; $i<count($names); $i++){
        echo $names[$i] . ' ';
        if($name == $names[$i]){
            $userID=$uID[$i];
        }
    }




    $sql="SELECT count(*) as db FROM `users-advertisements`.users";
    $res = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($res) ) {
        echo 'db: ' . $row["db"];
        $countID=$row["db"]+1;
    }

    $stmt = mysqli_prepare( $conn,"INSERT INTO `users-advertisements`.advertisement (id,userid, title) VALUES (?,?,?)");


$userID=5;
//TODO: the next row, the $title is not good.
    mysqli_stmt_bind_param($stmt, 'iis', $countID, $userID, $title);

    mysqli_stmt_execute($stmt);

}
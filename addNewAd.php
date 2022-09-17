<?php
include_once('connection.php');

function addNewAdvertisement($name, $title){
    $conn=connect();
    $sql="SELECT count(*) as db FROM `users-advertisements`.users;";
    $res = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($res) ) {
        echo 'db: ' . $row["db"];
        $countID=$row["db"]+1;
}
    $stmt = mysqli_prepare( $conn,"INSERT INTO `users-advertisements`.users (id, name) VALUES (?,?)");


    mysqli_stmt_bind_param($stmt, 'ds', $countID, $name);

mysqli_stmt_execute($stmt);

}

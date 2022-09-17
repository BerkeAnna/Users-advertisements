<?php
include_once('connection.php');
include_once('addNewUser.php');
include_once('addNewAdvertisement.php');

$name="";
$title="";
if(isset($_POST['username'])) {
$name = $_POST['username'];
}
if(isset($_POST['title'])) {
$title = $_POST['title'];
}

$conn=connect();
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
    if($name == $names[$i]){
        $userIsExist=true;
    }
}
//ha false akkor meghívja
if(!$userIsExist) {
    addNewUser($name);
}

addNewAdversitement($name, $title);

?>
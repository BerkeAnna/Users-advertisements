<?php
include_once('connection.php');
include_once('addNewAd.php');

$name="";
$title="";
if(isset($_POST['username'])) {
$name = $_POST['username'];
}
if(isset($_POST['title'])) {
$title = $_POST['title'];
}
addNewAdvertisement($name, $title);
?>
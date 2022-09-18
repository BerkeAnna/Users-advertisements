<?php
require_once('model/uploadU.php');
require_once('controller/userController.php');
require_once('index.php');

$name = $_POST['username'];
$title = $_POST['title'];

$upload = new userController($name, $title);


header("Location: index.php");

//ez controller
//TODO: ezt a fájlt kellene eltüntetni, a callUserCbe . De ha a indexben az 5-8sorig át tudom írni akkor nem kell a UserC

?>
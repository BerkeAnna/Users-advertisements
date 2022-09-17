<?php
require_once ('uploadU.php');

$name = $_POST['username'];
$title = $_POST['title'];

$upload = new uploadU($name,  $title);

$upload->uploadUser();



?>
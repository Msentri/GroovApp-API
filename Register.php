<?php
include './_configuration/GroveAppConfig.php';
include './_classes/clock.php';
include './_classes/DatabaseManipulation.php';
include './functions/GroveApp.php';

$groovapp = new GroveApp();





$name = $_POST['name'];
$surname = $_POST['surname'];
$id_number = $_POST['id'];
$password = $_POST['password'];
$email = $_POST['email'];
$cellphone = $_POST['cellphone'];
$dob = $_POST["dob"];
$type = $_POST["type"];


$create_user = $groovapp->create_user_g($name,$surname,$password,$cellphone,$email,$dob,$type);


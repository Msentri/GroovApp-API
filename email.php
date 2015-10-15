<?php
/**
 * Created by PhpStorm.
 * User: msentri
 * Date: 2015/10/09
 * Time: 9:24 AM
 */

$name = $_POST["name"];
$surname = $_POST["surname"];
//$user_id = $_POST["user_id"];
$email = $_POST["email"];

$to = $email;
$subject = "GroovApp Register";
$txt = "Hi $name $surname Thanks for Registering with GroovApp";
$headers = "From: info@groovapp.com";

mail($to,$subject,$txt,$headers);
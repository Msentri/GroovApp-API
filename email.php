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

$user_id = $_POST['user_id'];

$to = $email;
$subject = "GroovApp Register";

$link_address = "http://groovapp.codist.co.za/activate_user.php?user_id=$user_id";
$txt = "Hi $name $surname Thanks for Registering with GroovApp click or copy the link \n
to address bar to activate the user : <a href='".$link_address."'>Link</a>";
$headers = "From: info@groovapp.com";

mail($to,$subject,$txt,$headers);
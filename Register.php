<?php
include './_configuration/GroveAppConfig.php';
include './_classes/clock.php';
include './_classes/DatabaseManipulation.php';
include './functions/GroveApp.php';

$groovapp = new GroveApp();

$user_name = $_POST['name'];
$user_surname = $_POST['surname'];
$user_picture = "images";
$user_password = $_POST['password'];
$user_cell_phone = $_POST['cell'];
$user_email = $_POST['email'];
$user_dob = $_POST['dob'];
$user_membership_type = $_POST['member_type'];

$groovapp->Register_user($user_name,$user_surname,$user_picture,$user_password,
    $user_cell_phone,$user_email,
    $user_dob,$user_membership_type);


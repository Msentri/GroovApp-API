<?php
include './_configuration/GroveAppConfig.php';
include './_classes/clock.php';
include './_classes/DatabaseManipulation.php';
include './functions/GroveApp.php';

$groovapp = new GroveApp();





    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $id_number = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $cellphone = $_POST['cellphone'];
    

    $create_user = $groovapp->create_user($name, $surname, $id_number,$email,$cellphone ,$username,$password);

<?php
include './_configuration/GroveAppConfig.php';
include './_classes/clock.php';
include './_classes/DatabaseManipulation.php';
include './functions/GroveApp.php';








    $groovapp = new GroveApp();

    $username =$_POST['username'];



    $getUser = $groovapp->get_user($username);

<?php
include './_configuration/GroveAppConfig.php';
include './_classes/clock.php';
include './_classes/DatabaseManipulation.php';
include './functions/GroveApp.php';

$groovapp = new GroveApp();


$condition_get = $_POST['condition'];

if($condition_get == "main_map") {
    $condition = null;
    $groovapp->get_restaurants_places($condition);
}else{
    $condition = "type='$condition_get'";
    $groovapp->get_restaurants_places($condition);
}
<?php
include './_configuration/GroveAppConfig.php';
include './_classes/clock.php';
include './_classes/DatabaseManipulation.php';
include './functions/GroveApp.php';

$groovapp = new GroveApp();

$user_id = $_POST["user_id"];
$pan = $_POST["pan"];
$ccv = $_POST["cvv"];
$year = $_POST["year"];
$card_holder_name = $_POST["holder_name"];

$groovapp->credit_card_details($user_id,$pan,$ccv,$year,$card_holder_name);


<?php
include './_configuration/GroveAppConfig.php';
include './_classes/clock.php';
include './_classes/DatabaseManipulation.php';
include './functions/GroveApp.php';

$groovapp = new GroveApp();


$tableName = "tbl_user";
$columns = "*";
$condition = null;
$Limit = 1;
$db = "codistco_groovapp";

$results = $groovapp->select_limit($tableName,$columns,$condition,$db, $Limit);

$row =  mysql_fetch_array($results);


$response["success"] = 1;
$response["user_id"] = $row['user_first_name'];

// echoing JSON response
echo json_encode($response);
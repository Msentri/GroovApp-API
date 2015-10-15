<?php 
include './_configuration/GroveAppConfig.php';
include './_classes/clock.php';
include './_classes/DatabaseManipulation.php';
include './functions/GroveApp.php';

$groveApp = new GroveApp();

$condition = 1;

$groveApp->users($condition);


/*$groveApp->create_user("dasjdkas", "asdasda", "asdasdasd", "asdasdasd", "asdasdasdas");*/





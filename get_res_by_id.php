<?php
include './_configuration/GroveAppConfig.php';
include './_classes/clock.php';
include './_classes/DatabaseManipulation.php';
include './functions/GroveApp.php';

$groovapp = new GroveApp();

$id = $_GET['id'];

$groovapp->get_restaurants_places_by_id($id);
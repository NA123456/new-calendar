<?php 
include 'Ncalendar.php';
$calendar = new calendar();

$calendar->draw_calendar($_POST['y'],$_POST['m']);


?>
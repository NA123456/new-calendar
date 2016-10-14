<?php 
include 'Ncalendar.php';
include "events.php";

$calendar = new calendar();
$e = new events();


switch($_POST['action']){
case 'show':
$calendar->draw_calendar($_POST['y'],$_POST['m']);
break;

case 'retrive':
$e->retriveEvent($_POST['u'], $_POST['t'], $_POST['d'], $_POST['h'], $_POST['m'], $_POST['de']);
break;

case 'update':
$e->edit_event($_POST['u'], $_POST['t'], $_POST['d'], $_POST['h'], $_POST['m'], $_POST['de']);
break;
}

?>
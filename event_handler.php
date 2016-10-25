<?php
include 'events.php';
include 'Ncalendar.php';


$_events = new events();
$calendar = new calendar();

if(isset($_POST['save'])){
	
	$user =  $_POST['user'];
	$title = $_POST['title'];
	$date = $_POST['date'];
	$hour = $_POST['hour'];
	$minute = $_POST['minute'];
	$details = $_POST['details'];
	
	$_events->add_event($user,$title, $date, $hour, $minute, $details);
header('Location:index.php');		
	}
	
	
if(isset($_POST['update'])){
	$user =  $_POST['user'];
	$id = $_POST['id'];
	$title = $_POST['title'];
	$date = $_POST['date'];
	$hour = $_POST['hour'];
	$minute = $_POST['minute'];
	$details = $_POST['details'];
	
	$_events->edit_event($user, $id,$title,$date, $hour, $minute, $details);
header('Location:index.php');

	}
	
if(isset($_POST['delete'])){
	$user =  $_POST['user'];
	$id = $_POST['id'];
	$title = $_POST['title'];
	$date = $_POST['date'];
	$hour = $_POST['hour'];
	$minute = $_POST['minute'];
	$details = $_POST['details'];
	
	$_events->delete_event($id);
header('Location:index.php');
	
	}
	
if(isset($_POST['clear'])){
	$_events->clearAll();

	}
	
if(isset($_POST['go'])){
	$y= $_POST['year'];
	$m= $_POST['monthSelector'];
	$calendar->draw_calendar($y, $m);
	
	}
	
?>
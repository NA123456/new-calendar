<?php
include 'events.php';

$_events = new events();
if(isset($_POST['save'])){
	
	$user =  $_POST['user'];
	$title = $_POST['title'];
	$date = $_POST['date'];
	$hour = $_POST['hour'];
	$minute = $_POST['minute'];
	$details = $_POST['details'];
	
	$_events->add_event($user,$title, $date, $hour, $minute, $details);
		
	}
	
	
if(isset($_POST['update'])){
	$user =  $_POST['user'];
	$title = $_POST['title'];
	$date = $_POST['date'];
	$hour = $_POST['hour'];
	$minute = $_POST['minute'];
	$details = $_POST['details'];
	
	$_events->edit_event($user,$title,$date, $hour, $minute, $details);
	}
	
if(isset($_POST['delete'])){
	$user =  $_POST['user'];
	$title = $_POST['title'];
	$date = $_POST['date'];
	$hour = $_POST['hour'];
	$minute = $_POST['minute'];
	$details = $_POST['details'];
	
	$_events->edit_event($user,$title,$date, $hour, $minute, $details);
	
	}
header('Location:index.php');
	
?>
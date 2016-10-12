<?php
include "events.php";

$e = new events();

$e->retriveEvent($_POST['e']);
?>
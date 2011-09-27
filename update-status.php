<?php
$message = $_POST['message'];
$id = $_COOKIE['id'];
$time = time();

// Insert Into database
include "connect_db.php";
$query = mysql_query("Insert into updates (user_id,message,date_time) values('$id','$message','$time')") or die(mysql_error());
header("Location:home.php");
?>
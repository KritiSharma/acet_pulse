<?php
include "profile.php";
$time = time();
$to = $_POST['text1'];
$message = $_POST['text2'];
$query = mysql_query("Insert into messages (sender_id,receiver_id,message,date_time) values('$user->id','$person->id','$message','$time')") or die(mysql_error());
header("Location:profile.php");
?>

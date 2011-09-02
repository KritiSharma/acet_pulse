<?php

include "connect_db.php";

//checks cookies to make sure they are logged in
 if(isset($_COOKIE['username']))
 {
	$username = $_COOKIE['username'];
	$password = $_COOKIE['password'];
	$user_data = mysql_query("SELECT * FROM users WHERE username = '$username'")or die(mysql_error());
	while($info = mysql_fetch_array($user_data))
	{
	
		$user_id = $info['user_id'];
		$name=$info['name'];
		$display_picture = $info['display_picture'];
		$department = $info['department'];
		$dob   = $info['dob'];
		$sex   = $info['sex'];
		$acc_type = $info['user_type'];
	}
 }	
else
{
	header("Location: index.php");
}
?>
<?php

include "connect_db.php";
include "info.php";

//checks cookies to make sure they are logged in
 if(isset($_COOKIE['id']))
 {
	$id = $_COOKIE['id'];
	$user = new member($id);
 }	
else
{
	header("Location: index.php");
}
?>
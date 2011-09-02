<?php

include"connect_db.php";

// Check for the existing cookie
	if(isset($_COOKIE['username']))
	{
		$username = $_COOKIE['username'];
		$password = $_COOKIE['password'];
		header("Location: home.php");
	}
	else
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		if( isset($_POST) )
		{  
  
			//form validation vars  
			$formok = true;  
			
			//validate username is not empty  
			if(empty($username) ||  empty($password))
			{  
				$formok = false;  
				echo "Fill in both username and password fields"; 
			}
			
		}
		
		if($formok)
		{
			$check = mysql_query("SELECT * FROM users WHERE username = '$username'");
			$check2 = mysql_num_rows($check);
			if($check2 == 0)
			{
				echo "This user does not create an account";
			}
			while($info = mysql_fetch_array($check))
			{
				if($password != $info['password'])
				{
					echo "Incorrect Password";
				}
				else
				{
					setcookie('username',$username,$hour);
					setcookie('password',$password,$hour);
					header('location:home.php');
				}
			}
		}
		
		
	}
	
	
?>

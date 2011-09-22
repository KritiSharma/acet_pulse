<?php

include"connect_db.php";

// Check for the existing cookie
	if(isset($_COOKIE['username']))
	{
		$id = $_COOKIE['id'];
		$password = $_COOKIE['password'];
		header("Location: home.php");
	}
	else
	{
		$login = $_POST['username'];
		$password = $_POST['password'];
		
		if( isset($_POST) )
		{  
  
			//form validation vars  
			$formok = true;  
			
			//validate username is not empty  
			if(empty($login) ||  empty($password))
			{  
				$formok = false;  
				echo "Fill in both username and password fields"; 
			}
			
		}
		
		if($formok)
		{
			$check = mysql_query("SELECT * FROM users WHERE username = '$login'");
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
					$id = $info['user_id'];
					setcookie('id',$id,$hour);
					setcookie('password',$password,$hour);
					header('location:home.php');
				}
			}
		}
	}
	
	
?>

<?php
/* INCLUDES */
include "connect_db.php";

/* RETRIEVE THE FORM VALUES */

$username = $_POST['username'];
$email    = $_POST['email'];
$password = $_POST['pass'];
$cpassword = $_POST['pass2'];
$acc_type = $_POST['acc_type'];
$agree_tos = $_POST['agree_tos'];

 //Server Side validation
 
if( isset($_POST) )
	{  
		//form validation vars  
		$formok = true;  
		$errors = array();   
  
		//validate username is not empty  
		if(empty($username))
			{  
				$formok = false;  
				$errors[] = "You have not entered a username";  
			}
	
		//validate email address is not empty  
		if(empty($email))
			{  
				$formok = false;  
				$errors[] = "You have not entered an email address";  
				//validate email address is valid  
			}
		elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
			{  
				$formok = false;  
				$errors[] = "You have not entered a valid email address";  
			}
	
		//validate password
		if(empty($password))
			{
				$formok = false;
				$errors[] = "You have to enter a password";
			}
	
		//match passwords
		if(empty($cpassword))
			{
				$formok = false;
				$errors[] = "You must confirm password";
			}
		elseif($password != $cpassword)
			{
				$errors[] = "Passwords do not match";
				$formok = false;
			}
	
		if($agree_tos != "on" )
			{
				$formok = false;
				$errors[] = "You must accept TOS";
			}
	
	
	}

/* QUERYING DATABASE TO CHECK EXSISTING USER */
 if($formok)
	{
		$check = mysql_query("SELECT username FROM users WHERE username = '$username' ");
		$check_result = mysql_num_rows($check);
		if($check_result != 0)
		{
		echo "This Username is already taken";
		}
		else
		{
			/* INSERTING DATA IN DATABASE */
			$query="insert into users (username,password,email,user_type) values('$username','$password','$email','$acc_type')";
			$insert=mysql_query($query);
			$query = mysql_query("Select * from users where username = '$username'");
			$info = mysql_fetch_array($query);
			$id = $info['user_id'];
			
			$hour=time()+3600000;
			setcookie('id',$id,$hour);
			setcookie('password',$password,$hour);
			header('location:edit_profile.php');
		}
	}
    //what we need to return back to our form  
 else
 {
    $returndata = array(  
        'posted_form_data' => array(  
            'username' => $username,  
            'email' => $email,  
            'password' => $password,  
            'cpassword' => $cpassword,  
            'acc_type' => $acc_type  
        ),  
        'form_ok' => $formok,  
        'errors' => $errors  
    );  
  
    //if this is not an ajax request  
    if(empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) !== 'xmlhttprequest')
	{  
        //set session variables  
        session_start();  
        $_SESSION['cf_returndata'] = $returndata;  
  
        //redirect back to form  
        header('location: ' . $_SERVER['HTTP_REFERER']);  
    }  
  }
?>
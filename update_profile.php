<?php
	include "chkcookie.php";
	
	/* RETRIEVE THE FORM VALUES */
		$name = $_POST['name'];
		$department = $_POST['department'];
		$dob = $_POST['dob'];
		$sex = $_POST['sex'];

	//Server Side validation
		if(isset($_POST))
		{	  
			//form validation vars  
			$formok = true;  
			$errors = array();   
			if(empty($name))
			{	  
				$formok = false;  
				$errors[] = "You have not entered a name";  
				
			}
	
		}

	if($formok)
	{
		$query="update users SET 
			name = '$name',
			dob = '$dob',
			department = '$department',
			sex = '$sex'
			WHERE user_id = '$id'";
		$update=mysql_query($query) or die(mysql_error());
		
	}

	if($user->acc_type == 'Student')
	{
		$batch = $_POST['batch'];
		$status = $_POST['status'];
		$check = mysql_query("SELECT user_id FROM student WHERE user_id = '$user_id' ");
		$check_result = mysql_num_rows($check);
		if($check_result != 0)
		{
			$query = "UPDATE student set batch = '$batch', status = '$status' where user_id = $id";
		}
		else
		{
			$query="INSERT into student (user_id,batch,status) values('$id','$batch','$status') ";
		}
		
		$update=mysql_query($query) or die(mysql_error());
		header("Location:edit_profile.php");
	}

	if($user->acc_type == 'Faculty')
	{
		$exp = $_POST['exp'];
		$qual = $_POST['qual'];
		$desg = $_POST['desg'];
		$check = mysql_query("SELECT user_id FROM teachers WHERE user_id = '$id' ");
		$check_result = mysql_num_rows($check);
		if($check_result != 0)
		{
			$query = "UPDATE teachers set exp = '$exp', qual = '$qual', desg = '$desg' where user_id = $id";
		}
		else
		{
			$query="INSERT into teachers (user_id,exp,qual,desg) values('$id','$exp','$qual',$desg) ";
		}
		
		$update=mysql_query($query) or die(mysql_error());
		header("Location:edit_profile.php");
	}
?>









<?php
include "connect_db.php";
include "chkcookie.php";
//include "user_details.php";

/* RETRIEVE THE FORM VALUES */
$set_name = $_POST['name'];
$set_department = $_POST['department'];
$set_dob = $_POST['dob'];
$set_sex = $_POST['sex'];


/*$set_qul = $_POST['qul'];
$set_exp = $_POST['exp'];
$set_desg = $_POST['desg'];*/

 //Server Side validation
 if(isset($_POST))
 {  
  
    //form validation vars  
    $formok = true;  
    $errors = array();   
	
	if(empty($set_name))
	{  
       $formok = false;  
       $errors[] = "You have not entered a name";  
	}
	
}

if($formok)
{
  $query="update users SET 
  name = '$set_name',
  dob = '$set_dob',
  department = '$set_department',
  sex = '$set_sex'
  WHERE username = '$username'
	";
  $update=mysql_query($query);
}

if($acc_type == 'Student')
{
  $set_batch = $_POST['batch'];
  $set_status = $_POST['status'];
  $set_skills = $_POST['skills'];
  $check = mysql_query("SELECT user_id FROM student WHERE user_id = '$user_id' ");
  $check_result = mysql_num_rows($check);
  if($check_result != 0)
  {
     $query = "UPDATE student set batch = '$set_batch' where user_id = $user_id";
  }
  else
  {
     $query="INSERT into student (user_id,batch,status,skills) values('$user_id','$set_batch','$set_status','$set_skills') ";
  }
  $update=mysql_query($query) or die(mysql_error());
  header("Location:home.php");
}

if($acc_type == 'Faculty')
{
  $set_exp = $_POST['exp'];
  $set_qual = $_POST['qual'];
  $check = mysql_query("SELECT user_id FROM student WHERE user_id = '$user_id' ");
  $check_result = mysql_num_rows($check);
  if($check_result != 0)
  {
     $query = "UPDATE student set batch = '$set_batch' where user_id = $user_id";
  }
  else
  {
     $query="INSERT into teachers (user_id,exp,qual) values('$user_id','$set_exp','$set_qual') ";
  }
  $update=mysql_query($query) || die(mysql_error());
}
?>









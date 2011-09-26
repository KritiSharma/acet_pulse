<?php session_start() ?>
<?php 
 if(isset($_COOKIE['id']))
 {
	header("Location: home.php");
 }
?>

<!doctype html>

<html lang="en"> 
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title> ACET PULSE | Online Community for ACET, Amritsar </title>
  
  <meta name="description" content="Online Community For ACET, Amritsar">
  <meta name="author" content="Varun Kumar">
	
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="stylesheet" href="css/style.css">
</head>

<body class = "homepage">
	<div id="container">
		<header class = "home">
			<img src="img/logo.gif" alt="Acet Pulse" />
			<form action="login.php" method = "post" name = "login" id = "sign-in">
				<table>
					<tr> <td>Username</td> <td>Password</td> </tr>
					<tr> <td> <input type = "text" name="username" /> </td> <td> <input type = "password" name="password" /> </td> </tr>
				</table>
				<input type= "submit" name="submit" class = "button" value = "Sign In"> <small> <a href = "#"> Forgot Password? </a> </small>
			</form>
			<div class = "clear"> </div>
		</header>
		<div id="main" role="main">
			<div id = "content" >
				<p class = "y-label"> Live Notice Board  </p>
				<div class = "notice">
					<h1>This is the title for notice</h1>
					<span class = "date">21 August, 2011</span><br/>
					<span class = "notice-description">This is the sample notice. Here you can display any latest news or notice so that everyone should access it without trouble.</span>
				</div>
	
				<div class = "notice">
					<h1>This is the title for notice</h1>
					<span class = "date">21 August, 2011</span><br/>
					<span class = "notice-description">This is the sample notice. Here you can display any latest news or notice so that everyone should access it without trouble.</span>
				</div>
	
				<a href = "#" class = "sep">View All Notices </a> 
				<p class = "g-label" style = "width:570px;"> Departmental Notice Boards  </p>
	
				<ul class = "dep-list">
					<li> <a href = "#">Information Technology</a> </li>
					<li> <a href = "#">CSE</a> </li>
					<li> <a href = "#">Mechanical</a> </li>
					<li> <a href = "#">ECE</a></li>
					<li> <a href = "#">Civil</a> </li>
					<li> <a href = "#">EEE</a> </li>
					<li> <a href = "#">M.Tech</a> </li>
					<li> <a href = "#">MBA</a> </li>
					<li> <a href = "#">MCA</a> </li>
				</ul>
	
			</div>
			<div id = "registeration-form" >
				<p class = "g-label"> Create An Account </p>
	
				<?php  
					//init variables  
						$cf = array();  
						$sr = false;  
  
						if(isset($_SESSION['cf_returndata']))
						{  
							$cf = $_SESSION['cf_returndata'];  
							$sr = true;  
						}  
				?>
	
	
	
				<ul id="errors" class="<?php echo ($sr && !$cf['form_ok']) ? 'visible' : ''; ?>">  
					<li id="info">There were errors in the form</li>  
					<?php  
						if(isset($cf['errors']) && count($cf['errors']) > 0) :  
							foreach($cf['errors'] as $error) :  
					?>  
					<li><?php echo $error ?></li>  
					<?php  
							endforeach;  
						endif;  
					?>  
				</ul>
				<form action = "register.php" method = "post" id = "register-form">
					<h5>Username <h5/>
					<input type = "text" name = "username" class = "text" value = "<?php echo ($sr && !$cf['form_ok']) ? $cf['posted_form_data']['username'] : '' ?>" />
					<h5>Choose Password </h5>
					<input type = "password" name = "pass" class = "text"/>
					<h5>Confirm Password </h5>
					<input type = "password" name = "pass2" class = "text"/>
					<h5>Your Email </h5>
					<input type = "text" name = "email" class = "text" value = "<?php echo ($sr && !$cf['form_ok']) ? $cf['posted_form_data']['email'] : '' ?>" />
					<h5>Account Type</h5>
					<select name = "acc_type" class = "text list">
						<option>Student</option>
						<option>Faculty</option>
						<option>Admin</option>
					</select>
					<h5></h5>
					<input type = "checkbox" name = "agree_tos"/> <small> I agree to Terms & Condition of this site</small>
					<h5></h5>
					<input type = "submit"  value = "Sign Me Up" class = "button" />
					<?php unset($_SESSION['cf_returndata']); ?>
				</form>
			</div>
		</div>
    </div> 
	<footer>
		&#169 2011 Amritsar College of Engineering & Technology
    </footer>
</body>
</html>
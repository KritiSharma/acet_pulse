<?php session_start() ?>
<?php 
 if(isset($_COOKIE['username']))
 {
 header("Location: home.php");
 }


?>
<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7 ]> <html class="no-js ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title></title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Mobile viewport optimized: j.mp/bplateviewport -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Place favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">


  <!-- CSS: implied media="all" -->
  <link rel="stylesheet" href="css/style.css?v=2">

  <!-- Uncomment if you are specifically targeting less enabled mobile browsers
  <link rel="stylesheet" media="handheld" href="css/handheld.css?v=2">  -->

  <!-- All JavaScript at the bottom, except for Modernizr which enables HTML5 elements & feature detects -->
  <script src="js/libs/modernizr-1.7.min.js"></script>

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
  
	if(isset($_SESSION['cf_returndata'])){  
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
    
  </div> <!--! end of #container -->
<footer>
	&#169 2011 Amritsar College of Engineering & Technology
    </footer>

  <!-- JavaScript at the bottom for fast page loading -->

  <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if necessary -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js"></script>
  <script>window.jQuery || document.write("<script src='js/libs/jquery-1.5.1.min.js'>\x3C/script>")</script>


  <!-- scripts concatenated and minified via ant build script-->
  <script src="js/plugins.js"></script>
  <script src="js/script.js"></script>
  <!-- end scripts-->


  <!--[if lt IE 7 ]>
    <script src="js/libs/dd_belatedpng.js"></script>
    <script>DD_belatedPNG.fix("img, .png_bg"); // Fix any <img> or .png_bg bg-images. Also, please read goo.gl/mZiyb </script>
  <![endif]-->




</body>
</html>
<?php

	include "chkcookie.php";
	include "header.php";
	
?>


	
	<div id = "lbox">
	<img src = "<?php echo $user->display_picture; ?>" alt = "<?php echo  $user->name; ?>" class = "profile_pic" /> 
	</div>
	<div id = "mbox">
	<div class = "y-label">News Feed</div>
	</div>
	<div id = "rbox">
	<div class = "g-label">Search People</div>
	<form name = "search" method  = "post" action = "search.php">
	<input type = "text" name = "search" class = "searchbox"/>
	<input type= "submit" name="submit" class = "button" value = "Search">
	</form>
	<div class = "g-label">Connections</div>
	<?php
		$connections = mysql_query("Select * from connections where user_id = '$user->id'");
		while($info = mysql_fetch_array($connections))
		{
			
		}
	
	
	?>
	</div>
	<div class = "clear"> </div>
	
	

	<div class = "clear"> </div>
</div>
</body>




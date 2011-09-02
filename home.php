<?php

	include "chkcookie.php";
	include "header.php";
?>


	
	<div id = "lbox">
	<img src = "<?php echo $display_picture; ?>" alt = "<?php echo  $username; ?>" class = "profile_pic" /> 
	</div>
	<div id = "mbox">
	<div class = "y-label">News Feed</div>
	</div>
	<div id = "rbox">
	<div class = "g-label">Search People</div>
	<form name = "search" method  = "post" action = "search.php">
	<input type = "text" name = "search"/>
	</form>
	<div class = "g-label">Connections</div>
	</div>
	<div class = "clear"> </div>
	
	

	<div class = "clear"> </div>
</div>
</body>




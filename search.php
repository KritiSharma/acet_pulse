<?php

	
	include "chkcookie.php";
	include "header.php";
?>


	
	<?php
		$search = $_POST['search'];
		
		$query = mysql_query("Select * from users where name LIKE '%$search%'") or die(mysql_error());
		$count = mysql_num_rows($query);
		if($count == 0)
		echo "<div class = 'y-label'> No Results found for <b>$search</b> </div>";
		else
		echo"<div class = 'y-label'>Search Results For <strong>$search</strong></div>";
	?>
		<ul id = "search-results">
	<?php
		while($result = mysql_fetch_array($query))
		{
	?>
		<li> <img src = "<?php echo $result['display_picture']; ?>" alt = "<?php echo  $username; ?>" class = "profile_pic" />
		<a href = "profile.php?id=<?php echo $result['username'] ?>"><?php echo $result['name'];?></a></li>
		
	<?php
		}
	?>
	</ul>
	


</div>
</body>




<?php

	include "chkcookie.php";
	include "header.php";
	
?>


	
	<div id = "lbox">
		<img src = "<?php echo $user->display_picture; ?>" alt = "<?php echo  $user->name; ?>" class = "profile_pic" /> 
		<a href = "profile.php" style="font-weight:bold;font-size:12px;"><?php echo $user->name ?></a>
		<ul>
			<li><img src = "img/news.png"><a href = "#">News Stream</a></li>
			<li><img src = "img/msg.png"><a href = "#">Messages</a></li>
			<li><img src = "img/notice.png"><a href = "#">Notice Boards</a></li>
			<li><img src = "img/notes.png"><a href = "#">Notes</a></li>
		</ul>
		
		<script type = "text/javascript">
			$("#lbox li").first().addClass('hilite');
		</script>
	</div>
	<div id = "mbox">
		Update Your Status<br/>
		<textarea class = "status-update"></textarea>
	</div>
	<div id = "rbox">
		<form name = "search" method  = "post" action = "search.php">
			<input type = "text" name = "search" class = "searchbox"/>
			<input type= "submit" name="submit" class = "button" value = "Search">
		</form>
		<div >
			Connections
		</div>
		<?php
			$connections = mysql_query("Select * from connections where user_id = '$user->id'");
			while($info = mysql_fetch_array($connections))
			{
				$person = new member($info['connection_id']);
				echo "<a href = 'profile.php?id=$person->id'><img src = '$person->display_picture'/ width = 30 height = 30></a>";
			}
		?>
	</div>
	<div class = "clear"> 
	</div>
	
	

	
</div>
</body>




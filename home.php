<?php

	include "chkcookie.php";
	include "header.php";
	
?>


	
	<div id = "lbox">
		<img src = "<?php echo $user->display_picture; ?>" alt = "<?php echo  $user->name; ?>" class = "profile_pic" /> 
		<a href = "profile.php?id=<?php echo $user->id ?>" class = "bold-name"><?php echo $user->name ?></a>
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
		<strong>What you have to say?</strong><br/>
		<form method = "post" name = "status-update" action = "update-status.php" >
			<input type = "text" class = "status-update" name = "message" />
		</form>
		<ul class = "updates">
			<?php
				$user->connections($user->id);
				$matches = implode(',',$user->arr_connections);
				$query = mysql_query("SELECT * FROM updates where user_id in($matches,$user->id) order by date_time desc");
				while($info = mysql_fetch_array($query))
				{
					$by = new member($info['user_id']);
					echo "<li class = 'news-stream'><img src = '$by->display_picture'/> <a href = 'profile.php?id=$by->id' class ='bold-name'> $by->name </a><p>$info[message] </p>
						<div class = 'clear'></div></li>";
				}
			?>
		</ul>
		
	</div>
	<div id = "rbox">
		<form name = "search" method  = "post" action = "search.php" >
			<input type = "text" name = "search" class = "searchbox" placeholder = "Search People"/>
			
		</form>
		<span class = "label">Connections</span>
		<?php
			
			foreach($user->arr_connections as $mem_id)
			{
				$person = new member($mem_id);
				echo "<a href = 'profile.php?id=$person->id'><img src = '$person->display_picture'/ width = 30 height = 30></a>";
			}
		?>
	</div>
	<div class = "clear"> 
	</div>
	
</div>
</body>




<?php
	include "chkcookie.php";
	include "header.php";
	
	$id = $_GET['id'];
	$person = new member($id);
?>
<div id = left>
<img src = "<?php echo $person->display_picture; ?>" alt = "<?php echo  $person->name; ?>" class = "profile_pic big_thumbnail" />

<a href = "add_connection.php?id=<?php echo $person->id ?>">Connect</a>

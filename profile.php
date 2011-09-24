<?php
	include "chkcookie.php";
	include "header.php";
	
	$id = $_GET['id'];
	$person = new member($id);
?>

<img src = "<?php echo $person->display_picture; ?>" alt = "<?php echo  $person->name; ?>" class = "profile_pic big_thumbnail" />
<h1><?php echo $person->name ?></h1>
<a href = "add_connection.php?id=<?php echo $person->id ?>">Connect</a>

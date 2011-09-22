<?php
$past = time() - 100;
//this makes the time in the past to destroy the cookie
setcookie(id, gone, $past);
setcookie(password, gone, $past);
header("Location: index.php");
?> 
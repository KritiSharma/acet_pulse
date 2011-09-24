<?php

//This is the directory where images will be saved
$target = "images/";
$target = $target . basename( $_FILES['pic']['name']);

//This gets all the other information from the form






//This function separates the extension from the rest of the file name and returns it
function findexts ($filename)
{
$filename = strtolower($filename);
$exts = split("[/\\.]", $filename);
$n = count($exts)-1;
$exts = $exts[$n];
return $exts;
}

//This applies the function to our file
$ext = findexts ($_FILES['pic']['name']) ; 
    //This line assigns a random number to a variable. You could also use a timestamp here if you prefer.
    $ran = time ();

    //This takes the random number (or timestamp) you generated and adds a . on the end, so it is ready of the file extension to be appended.
    $ran2 = $ran.".";

    //This assigns the subdirectory you want to save into... make sure it exists!
    $target = "images/";

    //This combines the directory, the random file name, and the extension
    $target = $target . $ran2.$ext; 



// Connects to your Database
mysql_connect("localhost", "root", "") or die(mysql_error()) ;
mysql_select_db("acetpulse") or die(mysql_error()) ;
if(isset($_COOKIE['id']))
{
$id = $_COOKIE['id'];

//Writes the information to the database
$query = " UPDATE users
SET display_picture = '$target'
WHERE user_id = '$id'";
$result = mysql_query($query);
}
if(move_uploaded_file($_FILES['pic']['tmp_name'], $target))
{
header("Location: home.php");

}
else
{
echo "Sorry, there was a problem uploading your file.";
}














?> 

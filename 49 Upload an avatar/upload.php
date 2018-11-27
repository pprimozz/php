<?php

include('connect.php');

$_SESSION['username'] ='alex';
$username= $_SESSION['username'];

if($_POST['submit']) {

$name = $_FILES['myfile']['name'];
$tmp_name = $_FILES['myfile']['tmp_name'];

if($name){
	
	$location = "avatars/$name";
	move_uploaded_file($tmp_name, $location);
	
	$query = mysql_query("UPDATE users SET imagelocation='$location' WHERE username='$username'");
	
	die("Your avatar has been uploaded <a href='view.php'>Home</a>");
	
	
} else {

die("Please select a file!");
	
}

	
}


echo 'Welcome, '.$username.'<p>';

echo 'Upload your image:

<form action="upload.php" method="post" enctype="multipart/form-data">
File: <input type="file" name="myfile"> <input type="submit" name="submit" value="Upload">
</form>

';

?>
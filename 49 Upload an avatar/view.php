<?php

include('connect.php');

$username = $_SESSION['username'];

$query = mysql_query("SELECT * FROM users WHERE username='$username'");

if(mysql_num_rows($query) == 0) {

die("User not found");
	
} else {

	$row = mysql_fetch_assoc($query);
	$location = $row['imagelocation'];
	echo "<img src='$location' width='100' height='100'>";
}


?>
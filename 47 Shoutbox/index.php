<?php

session_start();
require_once('connect.php');
require_once('protect.php');

$_SESSION['uid'] = 3;

if (isset($_POST['submit'])) {
	$shout = protect($_POST['shout']);
	
	if(strlen($shout) > 255) {
	echo 'Your shout must be 255 characters long or shorter';	
	} else if($shout !==''){
		if(isset($_POST['name'])) {
			
			$name = protect($_POST['name']);
			
			$q = mysql_query("SELECT username FROM users WHERE username = '$name' ");
			if (mysql_num_rows($q) > 0) {
			echo 'That username is already in use';	
			} else if($name !=='') {
				if (strlen($name) > 32) {
				echo 'Your name cannot be more than 32 characters';	
				} else {
					
				mysql_query("INSERT INTO shouts SET user_id= 0, date_posted = NOW(), message = '$shout', name= '$name'");	
				}
			}
			
		} else {
			mysql_query("INSERT INTO shouts SET user_id= {$_SESSION['uid']}, date_posted = NOW(), message = '$shout'") or die(mysql_error());	
		}
		
	}
	
	
}


?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript">

$(document).ready(function(){
	
	$('#shoutbox').load('shouts.php');
	setInterval(function() {
		$('#shoutbox').load('shouts.php');
	}, 10000);
	
});

</script>
</head>
<body>

<div id="shoutbox">



</div>
<p>Give a shout yourself</p>

<form method="post" action="index.php">
	<?php if(! isset($_SESSION['uid']) ) :  ?>
	<div>
    <label for="name"> Name: </label>
    <input type="text" name="name" />
    </div>
    <?php endif; ?>
    
    <div>
    	<label for="shout">Shout: </label>
        <input type="text" name="shout" />
    </div>
    <input type="submit" name="submit" value="Shout" />
    </form>

</body>
</html>
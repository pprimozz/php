<?php
require_once 'connect.php';

$q = mysql_query("SELECT users.username, shouts.user_id, shouts.message, shouts.name FROM users 

				 INNER JOIN shouts ON users.id = shouts.user_id ORDER BY shouts.id
				
			     DESC LIMIT 20");
				 

$shouts = array();

while($r = mysql_fetch_assoc($q)) {
	$shouts[] = array(
	'user_id' => $r['user_id'],
	'username' => $r['username'],
	'message' => $r['message'],
	'name' => $r['name']
	
	);	
}

foreach ($shouts as $s) {
	$user = ( $s['user_id'] > 0) ? $s['username'] : $s['name'];
	
	echo $user . ' - ' . $s['message'] . '<br />';
}

?>
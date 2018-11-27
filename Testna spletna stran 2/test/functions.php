<?php
include 'db.php';

function saveIp($ip_address){
	
	$query = mysql_query("SELECT ip_address FROM visitors");
	while($result = mysql_fetch_array($query)){
		$res[]= $result['ip_address'];
		}
		if(in_array($ip_address, $res)){
			return 'obstaja madafaka';
			} else{
			return 'ne obstaja';	
			}
	}
	
function btn($ip_address){
	
$query = mysql_query("SELECT ip_address FROM visitors");
$ip = mysql_result($query, 0);
	if ($ip_address == $ip){
		return 'You already liked this';
		} else
			{
			return 'You just liked this shit';
			}
	}



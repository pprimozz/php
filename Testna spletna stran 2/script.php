<?php

include 'traffic/db.php';

$ip_address = $_SERVER["REMOTE_ADDR"];

$email = 'primozxy@gmail.com';
$subject = 'New visitor on website';
$message = 'New visitor with IP: '.$ip_address;

$query1 = mysql_query("SELECT ip_address FROM visitors");
$query2 = "INSERT INTO visitors(ip_address, date) VALUES('$ip_address', now())";

	while($result = mysql_fetch_array($query1)){
		
		$res[]= $result['ip_address'];
		}
		if(in_array($ip_address, $res)){
		
			if ($ip_address =='46.150.52.77' || strpos($ip_address, '66.249') !== FALSE) {} else{
			mail($email, $subject, $message);}
			
			} else{ 
			
			mysql_query($query2);
			if(strpos($ip_address, '66.249')!==FALSE){} else{	
			mail($email, $subject, $message);}
			}
			
mysql_close($conn);

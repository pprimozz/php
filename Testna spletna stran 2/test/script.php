<?php
include 'db.php';
include 'functions.php';

$ip_address = $_SERVER['REMOTE_ADDR'];

echo saveIp($ip_address);
		
?>
<?php
$host ='localhost';
$uname = 'primozpu_primoz';
$pass = 'chieftec123';
$db= 'primozpu_test';

mysql_connect($host, $uname, $pass) or die("Error connecting to database");
mysql_select_db($db);

$strsearch = $_POST['strsearch'];

if ($strsearch== ''){
	echo '';
	} else{
$query = mysql_query("SELECT * FROM users WHERE name LIKE '".$strsearch."%' ");

while ($result=mysql_fetch_assoc($query)){
	echo $result['name'].'</br>';
	}
}
?>
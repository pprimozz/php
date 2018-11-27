<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HTML5 tutorial</title>
<link rel="stylesheet" href="file:///C|/xampp/htdocs/main.css"/>
</head>
<body>
<?php


$mysql_host = "mysql4.000webhost.com";
$mysql_database = "a8766099_primozs";
$mysql_user = "a8766099_primozs";
$mysql_password = "chieftec123";

mysql_connect($mysql_host, $mysql_user, $mysql_password) or die("Napaka pri povezavi z strežnikom");
	
mysql_select_db("$mysql_database") or die ("Ne morem izbrati podatkovne baze.");

$query = mysql_query("SELECT id_novica, naslov, avtor FROM novica");

		
		while($rows = mysql_fetch_array($query)){
echo $rows['id_novica']. "<br>";

	
	}

?>


</body>
</html>

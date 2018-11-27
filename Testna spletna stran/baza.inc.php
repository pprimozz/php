<?php

$mysql_host = "mysql4.000webhost.com";
$mysql_database = "a8766099_primozs";
$mysql_user = "a8766099_primozs";
$mysql_password = "chieftec123";

$connection = mysql_pconnect("$mysql_host", "$mysql_user", "$mysql_password") or die ("Napaka pri povezavi s strežnikom!");

$db = mysql_select_db("$mysql_database") or die ("Ne morem izbrati podatkovne baze.");

?>

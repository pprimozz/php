<?php

$host ='localhost';
$uname = 'primozpu_primoz';
$pass = 'chieftec123';
$db= 'primozpu_test';

$conn = mysql_connect($host, $uname, $pass) or die("Error connecting to database");
mysql_select_db($db) or die("Can't access database");

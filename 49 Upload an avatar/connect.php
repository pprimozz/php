<?php


$error = "Could not connect to database";
$connect = mysql_connect("localhost", "root", "root") or die($error);
mysql_select_db("avatar") or die($error);

session_start();

?>
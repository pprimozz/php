<?php
session_start();
$_SESSION['user_id'] = '1';
$ip_addr = $_SERVER['REMOTE_ADDR'];

include 'db/connect.php';
include 'func/articles.php';
include 'func/like.php';


?>
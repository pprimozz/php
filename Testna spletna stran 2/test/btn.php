<?php
include 'db.php';
include 'functions.php';

$ip_address = $_SERVER['REMOTE_ADDR'];
echo btn($ip_address);

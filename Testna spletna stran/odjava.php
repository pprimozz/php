<?php

setcookie("MojKuki", $ime, time()-3600, "/");
$_SESSION['uporabnik'] = NULL;

include_once 'arhiv.php';

?>


<?php

function protect($v) {

$v = mysql_real_escape_string($v);
$v = htmlentities($v, ENT_QUOTES);
$v = trim($v);

return $v;
	
}


?>
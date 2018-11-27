<?php
header('Content-Type: text/plain');

$string = "I am \na test \r string";

echo preg_replace('#[ \n\r]+#',' ',$string);

?>
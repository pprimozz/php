<?php

$string = 'This is a string';

if (preg_match('/is/', $string )){   //preg_match išèe besede znotraj spremenljivke

echo 'Match found';
} else {

echo 'No match found';
}

?>
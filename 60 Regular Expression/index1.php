<?php
header('Content-type: text/plain');

$string = file_get_contents('http://www.youtube.com/');

preg_match('#<title>(.*)</title>#s',$string, $matches);

print_r($matches);

?>
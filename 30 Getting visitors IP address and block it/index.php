<?php

require 'conf.inc.php';

foreach($ip_blocked as $ip) {
  if($ip==$ip_address) {
   die('Your IP is blocked');
  }


}

?>

<h1>WELCOME</h1>
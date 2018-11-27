<?php
	function has_space($string){
	if(preg_match('/ /', $string)) {
	return true;
		} else {
		return false;
		}
	}
	$string = 'Thisdoesnthavespace';
	
	if (has_space($string)) {
	echo 'has a space';
	} else{
	echo 'Has no space';
	}

?>
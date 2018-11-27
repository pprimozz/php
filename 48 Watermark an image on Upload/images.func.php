<?php

function allowed_image($file) {
	$allowed_ext = array('jpg', 'jpeg', 'png', 'gif');
	$file_ex = explode('.', $file);
	$file_ext = end($file_ex);
	
	return (in_array($file_ext, $allowed_ext) == true) ? true : false;
	
}

function watermark_image($file, $destination){
	
	$watermark = imagecreatefrompng('images/watermark.png');
	
	$source = getimagesize($file);
	$source_mime = $source['mime'];
	
	if($source_mime== 'image/png'){
		$image = imagecreatefrompng($file);
	} else if($source_mime== 'image/jpeg') {
		$image = imagecreatefromjpeg($file);
	}else if($source_mime== 'image/gif') {
		$image = imagecreatefromgif($file);
	}
	
	imagecopy($image, $watermark, 10, 10, 0, 0, imagesx($watermark), imagesy($watermark));
	imagepng($image, $destination);
	
}

?>
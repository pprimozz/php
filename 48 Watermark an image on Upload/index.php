<?php
require 'images.func.php';

if (isset($_FILES['image'])){
	$file_name = $_FILES['image']['name'];
	$file_tmp = $_FILES['image']['tmp_name'];
	
	
	if (allowed_image($file_name)==true){
		$file_name = md5(microtime(true)).'.png';
		watermark_image($file_tmp, 'images/'.$file_name);
		
		echo '<p><a href="images/',$file_name,'">Click here to view watermarked image</a></p>';
		
	} else {
	echo '<p>Not an image or image type not accepted.</p>'	;
	}
	
	
}
  
?>


<form action="" method="post" enctype="multipart/form-data">
	choose an image:
    <input type="file" name="image" />
    <input type="submit" value="Watermark" />

</form> 
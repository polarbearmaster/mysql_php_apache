<?php 
$baseimage = imagecreatefrompng("img1.png");

// loop through images #2 through the end
for ($i=2; $i < 5 ; $i++) { 
	// allocate the transparent color, and stack
	$myImage = imagecreatefrompng("img".$i.".png");
	$gray = imagecolorallocate($myImage, 185, 185, 185);
	imagecolortransparent($myImage, $gray);
	imagecopymerge($baseimage, $myImage, 0, 0, 0, 0, 150, 150, 100);
}

header("Content-type: image/png");
imagepng($baseimage);

imagedestroy($baseimage);
 ?>
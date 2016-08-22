<?php 
$myImage = imagecreate(300, 300);

$black = imagecolorallocate($myImage, 0, 0, 0);
$white = imagecolorallocate($myImage, 255, 255, 255);
$red = imagecolorallocate($myImage, 255, 0, 0);
$green = imagecolorallocate($myImage, 0, 255, 0);
$blue = imagecolorallocate($myImage, 0, 0, 255);

$lt_red = imagecolorallocate($myImage, 255, 150, 150);
$lt_green = imagecolorallocate($myImage, 150, 255, 150);
$lt_blue = imagecolorallocate($myImage, 150, 150, 255);

// draw the shaded area
for ($i=110; $i > 100; $i--) { 
	imagefilledarc($myImage, 100, $i, 200, 150, 0, 90, $lt_red, IMG_ARC_PIE);
	imagefilledarc($myImage, 100, $i, 200, 150, 90, 180, $lt_green, IMG_ARC_PIE);
	imagefilledarc($myImage, 100, $i, 200, 150, 180, 360, $lt_blue, IMG_ARC_PIE);
}


imagefilledarc($myImage, 100, 100, 200, 150, 0, 90, $red, IMG_ARC_PIE);
imagefilledarc($myImage, 100, 100, 200, 150, 90, 180, $green, IMG_ARC_PIE);
imagefilledarc($myImage, 100, 100, 200, 150, 180, 360, $blue, IMG_ARC_PIE);

header("Content-type: image/png");
imagepng($myImage);

imagedestroy($myImage);
 ?>
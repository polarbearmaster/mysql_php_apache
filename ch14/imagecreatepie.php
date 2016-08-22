<?php 
$myImage = imagecreate(300, 300);

$black = imagecolorallocate($myImage, 0, 0, 0);
$white = imagecolorallocate($myImage, 255, 255, 255);
$red = imagecolorallocate($myImage, 255, 0, 0);
$green = imagecolorallocate($myImage, 0, 255, 0);
$blue = imagecolorallocate($myImage, 0, 0, 255);

imagefilledarc($myImage, 100, 100, 200, 150, 0, 90, $red, IMG_ARC_PIE);
imagefilledarc($myImage, 100, 100, 200, 150, 90, 180, $green, IMG_ARC_PIE);
imagefilledarc($myImage, 100, 100, 200, 150, 180, 360, $blue, IMG_ARC_PIE);

header("Content-type: image/png");
imagepng($myImage);

imagedestroy($myImage);
 ?>
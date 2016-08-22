<?php 
$myImage = imagecreate(300, 300);

$black = imagecolorallocate($myImage, 0, 0, 0);
$white = imagecolorallocate($myImage, 255, 255, 255);
$red = imagecolorallocate($myImage, 255, 0, 0);
$green = imagecolorallocate($myImage, 0, 255, 0);
$blue = imagecolorallocate($myImage, 0, 0, 255);

imagefilledrectangle($myImage, 15, 15, 95, 155, $red);
imagefilledrectangle($myImage, 95, 155, 175, 295, $white);
imagefilledrectangle($myImage, 175, 15, 255, 155, $red);

header("Content-type: image/png");
imagepng($myImage);

imagedestroy($myImage);
 ?>
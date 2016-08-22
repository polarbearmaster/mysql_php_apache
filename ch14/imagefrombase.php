<?php 
$myImage = imagecreatefrompng("baseimage.png");

$white = imagecolorallocate($myImage, 255, 255, 255);

imagefilledellipse($myImage, 100, 70, 20, 20, $white);
imagefilledellipse($myImage, 175, 70, 20, 20, $white);
imagefilledellipse($myImage, 250, 70, 20, 20, $white);

header("Content-type: image/png");
imagepng($myImage);

imagedestroy($myImage);
 ?>
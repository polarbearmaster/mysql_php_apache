<?php 
$filename = "test.txt";
$fp = fopen($filename, "r") or die("couldn't open $filename");
while (!feof($fp)) {
	$line = fgets($fp, 1024);
	echo $line."<br />";
}
 ?>
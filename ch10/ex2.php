<?php 
$time = time();
echo date("m/d/y G:i:s e", $time);
echo "<br />";
echo "Today is";
echo date("jS \of F Y,\a\\t g:ia \i\\n e", $time);
 ?>
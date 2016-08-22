<?php 
setcookie("vegetable", "artichoke", time()+3600, "/", "localhost", 0);

if (isset($_COOKIE['vegetable'])) {
	echo "<p>Hello again! You have chosen: ".$_COOKIE['vegetable'].".</p>";
} else {
	echo "<p>Hello, you. This may be your first visit.</p>";
}
 ?>
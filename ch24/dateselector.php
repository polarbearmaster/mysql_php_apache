<?php
if (!isset($_POST['month']) || !isset($_POST['year'])) {
    $nowArray = getdate();
    $month = $nowArray['mon'];
    $year = $nowArray['year'];
} else {
    $month = $_POST['month'];
    $year = $_POST['year'];
}

$start = mktime(12, 0, 0, $month, $year);
$firstDayArray = getdate($start)
?>

<html>
<head>
	<title><?php echo "Calendar:".$firstDayArray['month']." ".$firstDayArray['year']; ?></title>
</head>
<body>
<h1>Select a Month/Year Combination</h1>
<form method="post" action="<?php echo $_SERVER['PHPSELF']; ?>">
<select name="month">
	<?php 
	$months = Array("January", "February", "March", "April", "May",  "June", "July", "August", "September", "October", "November", "December");
	for ($x=1; $x <= count($months) ; $x++) { 
		echo "<option value=\"$x\"";
		if ($x == $month) {
			echo "selected";
		}
		echo ">".$months[$x-1]."</option>";
	}
	?>
</select>
<select name="year">
	<?php 
	for($x = 1990; $x <=2020; $x++) {
		echo "<option";
		if ($x == $year) {
			echo " selected";
		}
		echo ">$x</option>";
	}
	 ?>
</select>
<button type="submit" name="submit" value="submit">Go!</button>
</form>
</body>
</html>
<?php 
function doDB() {
	global $mysqli;

	$mysqli = mysqli_connect("127.0.0.1", "root","123456","ch16");

	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
}

function emailChecker($email) {
	global $mysqli, $safe_email, $check_res;

	$safe_email = mysqli_real_escape_string($mysqli, $email);
	$check_sql = "SELECT id FROM SUBSCRIBERS WHERE email = '".$safe_email."'";
	$check_res = mysqli_query($mysqli, $check_sql) or die (mysqli_error($mysqli));
}
 ?>
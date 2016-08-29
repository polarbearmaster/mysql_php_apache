<?php 
if (!isset($_POST['username']) || !isset($_POST['password'])) {
	header("Location: userlogin.html");
	exit();
}

$mysqli = mysqli_connect("127.0.0.1", "root", "123456", "ch16");

$username = mysqli_real_escape_string($mysqli, $_POST['username']);
$password = mysqli_real_escape_string($mysqli, $_POST['password']);

$sql = "SELECT f_name, l_name FROM auth_users WHERE username = '".$username."' AND password = PASSWORD('".$password."')";
$result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

if (mysqli_num_rows($result) == 1)	{
	while ($info = mysqli_fetch_array($result)) {
		$f_name = stripslashes($info['f_name']);
		$l_name = stripslashes($info['l_name']);
	}

	setcookie("auth", "1", 0, "/", "localhost", 0);

	$display_block = "<p>".$f_name." ".$l_name." is authorized!</p>
					  <p>Authorized User's Menu: </p>
					  <ul>
					  <li><a href=\"secretpage.php\">secret page</a></li>
					  </ul>";
} else {
	header("Location: userlogin.html");
	exit();
}
mysqli_close($mysqli);
?>

<!DOCTYPE html>
<html>
<head>
	<title>User Login</title>
</head>
<body>
<?php echo $display_block; ?>
</body>
</html>

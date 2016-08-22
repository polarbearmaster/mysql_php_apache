<?php 
include 'ch20_include.php';
doDB();

if (!$_POST) {
	$display_block = "<h1>Select an Entry</h1>";

	$get_list_sql = "SELECT id, CONCAT_WS(', ', l_name, f_name) AS display_name FROM master_name ORDER BY l_name, f_name";
	$get_list_res = mysqli_query($mysqli, $get_list_sql) or die(mysqli_error($mysqli));

	if (mysqli_num_rows($get_list_res) < 1) {
		$display_block .= "<p><em>Sorry, no records to select!</em></p>";	
	} else {
		$display_block .= "
		<form method=\"post\" action=\"".$_SERVER['PHP_SELF']."\">
		<p><label for=\"sel_id\">Select a Record:</label><br/>
		<select id=\"sel_id\" name=\"sel_id\" required=\"required\">
		<option value=\"\">-- Select One --</option>";
		
		while ($recs = mysqli_fetch_array($get_list_res)) {
			$id = $recs['id'];
			$display_name = stripslashes($recs['display_name']);
			$display_block .= "<option value=\"".$id."\">".$display_name."</option>";
		}

		$display_block .= "
		</select></p>
		<button type=\"submit\" name=\"submit\" value=\"delete\">Delete Selected Entry</button>
		</form>";
	}
	mysqli_free_result($get_list_res);
} else {
	if ($_POST['sel_id'] == "") {
		header("Location: delentry.php");
		exit();
	} 

	$safe_id = mysqli_real_escape_string($mysqli, $_POST['sel_id']);

	$del_master_sql = "DELETE FROM master_name WHERE id = '".$safe_id."'";
	$del_master_res = mysqli_query($mysqli, $del_master_sql) or die(mysqli_error($mysqli));

	$del_address_sql = "DELETE FROM address WHERE id = '".$safe_id."'";
	$del_address_res = mysqli_query($mysqli, $del_address_sql) or die(mysqli_error($mysqli));

	$del_tel_sql = "DELETE FROM telephone WHERE id = '".$safe_id."'";
	$del_tel_res = mysqli_query($mysqli, $del_tel_sql) or die(mysqli_error($mysqli));

	$del_fax_sql = "DELETE FROM fax WHERE id = '".$safe_id."'";
	$del_fax_res = mysqli_query($mysqli, $del_fax_sql) or die(mysqli_error($mysqli));

	$del_email_sql = "DELETE FROM email WHERE id = '".$safe_id."'";
	$del_email_res = mysqli_query($mysqli, $del_email_sql) or die(mysqli_error($mysqli));

	$del_note_sql = "DELETE FROM personal_notes WHERE id = '".$safe_id."'";
	$del_note_res = mysqli_query($mysqli, $del_note_sql) or die(mysqli_error($mysqli));

	mysqli_close($mysqli);

	$display_block = "<h1>Record(s) Deleted</h1>
					  <p>Would you like to 
					  <a href=\"".$_SERVER['PHP_SELF']."\">delete another</a>?</p>";
}
?>

<html>
<head>
	<title>My Records</title>
</head>
<body>
<?php echo $display_block; ?>
</body>
</html>
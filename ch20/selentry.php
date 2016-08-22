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
		<button type=\"submit\" name=\"submit\" value=\"view\">View Selected Entry</button>
		</form>";
	}
	mysqli_free_result($get_list_res);
} else {
	if ($_POST['sel_id'] == "") {
		header("Location: selentry.php");
		exit();
	} 

	$safe_id = mysqli_real_escape_string($mysqli, $_POST['sel_id']);

	$get_master_sql = "SELECT concat_ws(' ', f_name, l_name) as display_name FROM master_name WHERE id = '".$safe_id."'";
	$get_master_res = mysqli_query($mysqli, $get_master_sql) or die(mysqli_error($mysqli));

	while ($name_info = mysqli_fetch_array($get_master_res)) {
		$display_name = stripslashes($name_info['display_name']);
	}

	$display_block = "<h1>Showing Record for ".$display_name."</h1>";

	mysqli_free_result($get_master_res);

	$get_addresses_sql = "SELECT address, city, state, zipcode, type FROM address WHERE master_id = '".$safe_id."'";
	$get_addresses_res = mysqli_query($mysqli, $get_addresses_sql) or die(mysqli_error($mysqli));

	if (mysqli_num_rows($get_addresses_res) > 0) {
		$display_block .= "<p><strong>Addresses:</strong><br /><ul>";

		while ($add_info = mysqli_fetch_array($get_addresses_res)) {
			$address = stripcslashes($add_info['address']);
			$city = stripcslashes($add_info['city']);
			$state = stripcslashes($add_info['state']);
			$zipcode = stripcslashes($add_info['zipcode']);
			$address_type = $add_info['type'];

			$display_block .= "<li>$address $city $state $zipcode ($address_type)</li>";

		}

		$display_block .= "</ul>";
	}
	mysqli_free_result($get_addresses_res);

	$get_tel_sql = "SELECT tel_number, type FROM telephone WHERE master_id = '".$safe_id."'";
	$get_tel_res = mysqli_query($mysqli, $get_tel_sql) or die(mysqli_error($mysqli));

	if (mysqli_num_rows($get_tel_res) > 0) {
		$display_block .= "<p><strong>Telephone:</strong><br /><ul>";

		while ($tel_info = mysqli_fetch_array($get_tel_res)) {
			$tel_number = stripcslashes($tel_info['tel_number']);
			$tel_type = $tel_info['type'];

			$display_block .= "<li>$tel_number ($tel_type)</li>";

		}

		$display_block .= "</ul>";
	}
	mysqli_free_result($get_tel_res);

	$get_fax_sql = "SELECT fax_number, type FROM fax WHERE master_id = '".$safe_id."'";
	$get_fax_res = mysqli_query($mysqli, $get_fax_sql) or die(mysqli_error($mysqli));

	if (mysqli_num_rows($get_fax_res) > 0) {
		$display_block .= "<p><strong>Fax:</strong><br /><ul>";

		while ($fax_info = mysqli_fetch_array($get_fax_res)) {
			$fax_number = stripcslashes($fax_info['fax_number']);
			$fax_type = $fax_info['type'];

			$display_block .= "<li>$fax_number ($fax_type)</li>";

		}

		$display_block .= "</ul>";
	}
	mysqli_free_result($get_fax_res);


	$get_email_sql = "SELECT email, type FROM email WHERE master_id = '".$safe_id."'";
	$get_email_res = mysqli_query($mysqli, $get_email_sql) or die(mysqli_error($mysqli));

	if (mysqli_num_rows($get_email_res) > 0) {
		$display_block .= "<p><strong>Email:</strong><br /><ul>";

		while ($email_info = mysqli_fetch_array($get_email_res)) {
			$email = stripcslashes($email_info['email']);
			$email_type = $email_info['type'];

			$display_block .= "<li>$email ($email_type)</li>";

		}

		$display_block .= "</ul>";
	}
	mysqli_free_result($get_email_res);


	$get_notes_sql = "SELECT note FROM personal_notes WHERE master_id = '".$safe_id."'";
	$get_notes_res = mysqli_query($mysqli, $get_notes_sql) or die(mysqli_error($mysqli));

	if (mysqli_num_rows($get_notes_res) == 1) {

		while ($note_info = mysqli_fetch_array($get_notes_res)) {
			$note = nl2br(stripslashes($note_info['note']));
		}

		$display_block .= "<p><strong>Personal Notes:</strong><br />$note</p>";
	}
	mysqli_free_result($get_notes_res);


	$display_block .= "<br />
	<p style=\"text-align:center\">
	<a href=\"".$_SERVER['PHP_SELF']."\">Select another</a></p>";
}

mysqli_close($mysqli);
 ?>

 <html>
 <head>
 	<title>My Records</title>
 </head>
 <body>
 <?php echo $display_block; ?>
 </body>
 </html>


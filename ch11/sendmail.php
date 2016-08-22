<?php 
$msg  = "Name:      ".$_POST['name']."\n";
$msg .= "E-Mail:    ".$_POST['email']."\n";
$msg .= "Message:   ".$_POST['message']."\n";

$recipient = "fujun.huang0709@gmail.com";
$subject = "Form Submission Results";
$mailheaders  = "From: My Web Site <defaultaddress@yourdomail.com> \n";
$mailheaders .= "Reply-To: ".$_POST['email'];

mail($recipient, $subject, $msg, $mailheaders); 
?>

<html>
<head>
	<title>Sending mail from the form in Listening 11.10</title>
</head>
<body>
	<p>Thanks. <strong><?php echo $_POST['name'] ?></strong>, for your message.</p>
	<p>Your e-mail address:
		<strong><?php echo $_POST['email']; ?></strong></p>
	<p>Your message: <br/ ><?php echo $_POST['message']; ?></p>
</body>
</html>
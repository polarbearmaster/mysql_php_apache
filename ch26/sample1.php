<?php 
$page_title = "sample page A";
$user_agent = getenv('HTTP_USER_AGENT');

$mysqli = mysqli_connect("127.0.0.1", "root", "123456", "ch16") or die(mysqli_error());

$sql = "INSERT INTO access_tracker (page_title, user_agent, date_accessed) VALUES ('$page_title', '$user_agent', now())";
$result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

mysqli_close($mysqli);
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Sample Page A</title>
 </head>
 <body>
 <h1>Sample Page A</h1>
 <p>blah blah blah.</p>
 </body>
 </html>
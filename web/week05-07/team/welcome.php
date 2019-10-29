<?php 
	session_start();
​
	if (!isset($_SESSION['userId']))
	{
		header("Location: sign-in.php");
		die();
	}
?>
​
<!DOCTYPE html>
​
<html>
  <head>
    <meta charset="UTF-8">
    <title>Welcome</title>
  </head>
  <body>
	<h1>Welcome!</h1>
  </body>
</html>
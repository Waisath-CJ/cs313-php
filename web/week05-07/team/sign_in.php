<?php 
	session_start();
​
	if (isset($_SESSION['userId']))
	{
		header("Location: welcome.php");
		die();
	}
​
	$message = $_GET['message'];
?>
​
<!DOCTYPE html>
​
<html>
  <head>
    <meta charset="UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>Sign-In</title>
  </head>
  <body>
	<h1>Sign-In</h1>
	<?php 
		if (isset($message)){
			echo "<div>$message</div>";
		}
	?>
	<form action="login.php" method="post">
	  <div class="form-group">
		<label for="username">Username:</label>
		<input type="text" class="form-control" id="username" name="username">
	  </div>
	  <div class="form-group">
		<label for="pwd">Password:</label>
		<input type="password" class="form-control" id="pwd" name="pwd">
	  </div>
	  <button type="submit" class="btn btn-default">Submit</button>
	</form>
	<br/><br/>
	<div>Don't have an account? <a href="sign-up.php">Sign Up</a></div>
  </body>
</html>
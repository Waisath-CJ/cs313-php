<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Prove 03 - PHP Shopping Cart</title>
		<meta charset="utf-8">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	</head>
	
	<body>
		<div id="wrapper">
			<?php include "nav.php"; ?>

			<h2>Order Confirmation</h2>

			<?php 
				session_unset();
				session_destroy();
			?>
		</div>
	</body>
</html>
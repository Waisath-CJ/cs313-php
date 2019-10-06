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
			<header>
				<h1 class="display-2 text-center">The Video Game Emporium</h1>
				<ul class="nav nav-pills nav-justified">
					<li class="nav-item">
						<a class="nav-link" href="browse.php">Browse Items</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" href="viewCart.php">View Cart</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="checkout.php">Checkout</a>
					</li>
				</ul>
			</header>

			<?php echo $_SESSION["lozCount"]; ?>
		</div>
	</body>
</html>
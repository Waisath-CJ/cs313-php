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
		<style type="text/css">
			img {
				width: 50%;
				height: 50%;
			}
		</style>
	</head>
	
	<body>
		<div id="wrapper">
			<header>
				<h1 class="display-2 text-center">The Video Game Emporium</h1>
				<ul class="nav nav-pills nav-justified">
					<li class="nav-item">
						<a class="nav-link active" href="browse.php">Browse Items</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="viewCart.php">View Cart</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="checkout.php">Checkout</a>
					</li>
				</ul>
			</header>

			<p>Please look at some of our fine videogames in stock.</p>
			<table class="table table-bordered">
				<tr>
					<th>Product</th>
					<th>Price</th>
					<th>Add to Cart</th>
				</tr>
				<tr>
					<td><img src="pictures/loz.png" alt="Legend of Zelda - Breath of the Wild" class="mx-auto d-block"></td>
					<td>$10.90</td>
					<td><button type="button" onclick="">Add to Cart</button></td>
				</tr>
				<tr>
					<td><img src="pictures/blops4.jpg" alt="Call of Duty: Black Ops 4" class="mx-auto d-block"></td>
					<td>$15.99</td>
					<td><button type="button" onclick="">Add to Cart</button></td>
				</tr>
				<tr>
					<td><img src="pictures/reach.png" alt="Halo: Reach" class="mx-auto d-block"></td>
					<td>$21.43</td>
					<td><button type="button" onclick="">Add to Cart</button></td>
				</tr>
			</table>
		</div>
	</body>
</html>
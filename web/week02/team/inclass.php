<doctype html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8">
	</head>

	<body>
		<h1>PHP In-Class Team Activity</h1>
		<?php
			for ($i = 1; $i <= 10; $i++) {
				if ($i % 2 == 0) 
					echo "<div style='background-color: red'>$i</div>";
				else
					echo "<div>$i</div>";
			}
		?>
	</body>
</html>
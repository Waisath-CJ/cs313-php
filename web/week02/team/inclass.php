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
				$div = "<div";
				if ($i % 2 == 0) {
					$div += " style='color: red'";
				}
				$div += ">$i</div>";

				echo $div;
			}
		?>
	</body>
</html>
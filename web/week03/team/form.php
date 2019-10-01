<!DOCTYPE html>
<html>
	<head>
		<title>Team Activity - Week 03</title>
		<meta charset="utf-8">
	</head>

	<body>
		<div id="wrapper">
			<form action="handler.php" method="post">
				Name: <input type="text" name="name"><br>
				Email: <input type="text" name="email"><br>
				Please pick your major:<br>
				<?php
					$majors = ["Computer Science"=>"CS", "Web Design and Development"=>"WDD", "Computer Information Technology"=>"CIT", "Computer Engineering"=>"CE"];

					foreach($majors as $major) {
						echo "<input type="radio" name="major" value=$major>$major <br>";
					}
				?>
				Comments: <textarea name="comments"></textarea><br>
				Which continents have you been to? <br>
				<input type="checkbox" name="continents[]" value="0">North America <br>
				<input type="checkbox" name="continents[]" value="1">South America <br>
				<input type="checkbox" name="continents[]" value="2">Europe <br>
				<input type="checkbox" name="continents[]" value="3">Asia <br>
				<input type="checkbox" name="continents[]" value="4">Australia <br>
				<input type="checkbox" name="continents[]" value="5">Africa <br>
				<input type="checkbox" name="continents[]" value="6">Antarctica <br>
				<input type="submit" name="submit">
			</form>
		</div>
	</body>
</html>
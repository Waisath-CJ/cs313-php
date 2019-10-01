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
				<input type="checkbox" name="continents[]" value="North America">North America <br>
				<input type="checkbox" name="continents[]" value="South America">South America <br>
				<input type="checkbox" name="continents[]" value="Europe">Europe <br>
				<input type="checkbox" name="continents[]" value="Asia">Asia <br>
				<input type="checkbox" name="continents[]" value="Australia">Australia <br>
				<input type="checkbox" name="continents[]" value="Africa">Africa <br>
				<input type="checkbox" name="continents[]" value="Antarctica">Antarctica <br>
				<input type="submit" name="submit">
			</form>
		</div>
	</body>
</html>
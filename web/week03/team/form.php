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
				<input type="radio" name="major" value="CS">Computer Science<br>
				<input type="radio" name="major" value="WDD">Web Design and Development<br>
				<input type="radio" name="major" value="CIT">Computer Information Technology<br>
				<input type="radio" name="major" value="CE">Computer Engineering<br>
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
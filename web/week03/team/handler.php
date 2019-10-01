<!DOCTYPE html>
<html>
	<head>
		<title>Team Activity - Week 03</title>
		<meta charset="utf-8">
	</head>
	
	<body>
		<div id="wrapper">
			<p>Your name is: <?php echo $_POST["name"]; ?></p>
			<p>Your email is: <a href="mailto:<?php echo $_POST["email"]; ?>"><?php echo $_POST["email"]; ?></a></p>	
			<p>Your major is: <?php echo $_POST["major"]; ?></p>
			<p>Comments: <?php echo $_POST["comments"]; ?></p>
			<p>Continents visited: <br>
				<?php 
					$cont = [0=>"North America",1=>"South America",2=>"Europe",3=>"Asia",4=>"Australia",5=>"Africa",6=>"Antarctica"];
   				foreach ($_POST['continents'] as $continent) {
       				echo $cont[$continent]."<br>";
     				} 
				?>
			</p>		
		</div>
	</body>
</html>
<!DOCTYPE html>
<?php 
	try
	{
	  $dbUrl = getenv('DATABASE_URL');

	//  if (empty($dbUrl)) {
	//	// example localhost configuration URL with postgres username and a database called cs313db
	//	$dbUrl = "postgres://postgres:password@localhost:5432/cs313db";
	//  }

	  $dbOpts = parse_url($dbUrl);

	  $dbHost = $dbOpts["host"];
	  $dbPort = $dbOpts["port"];
	  $dbUser = $dbOpts["user"];
	  $dbPassword = $dbOpts["pass"];
	  $dbName = ltrim($dbOpts["path"],'/');

	  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

	  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch (PDOException $ex)
	{
	  echo 'Error!: ' . $ex->getMessage();
	  die();
	}
?>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Scripture Sources</title>
</head>
<body>
	<h1>Scripture Resources</h1>
	<br/>
	<?php 
		foreach ($db->query('SELECT book, chapter, verse, content FROM Scriptures') as $row)
		{
			echo '<b>'. $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</b> - "';
			echo $row['content'] . '"</br>';
		}
	?>
	<form action="search.php" method="post">
		<input name="book" type="text"></input>
		<button type="submit">Submit</button>
	</form>
</body>
</html>
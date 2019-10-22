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

	$book = $_POST['book'];

	foreach ($db->query("SELECT * FROM Scriptures WHERE book LIKE '%$book%'") as $row)
	{
		echo '<a href="details.php?id=' . $row[id] .'"><b>'. $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</b></a></br>';
	}
?>
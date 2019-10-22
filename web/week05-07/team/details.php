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

	$id = $_GET["id"];

	foreach ($db->query('SELECT book, chapter, verse, content FROM Scriptures WHERE id = ' . $id) as $row)
	{
		echo '<b>'. $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</b> - "';
		echo $row['content'] . '"</br>';
	}
?>
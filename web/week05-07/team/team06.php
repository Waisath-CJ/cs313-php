<!doctype html>
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

<html>
    <head>
        <title>Week 06 Team Activity</title>
        <meta charset="utf-8">
    </head>

    <body>
        <h1>Scripture Topics</h1>
        <form action="addTopic.php" method="post">
            Scripture Book: <input type="text" name="book"><br>
            Scripture Chapter: <input type="text" name="chapter"><br>
            Verse(s): <input type="text" name="verse"><br>
            Content: <textarea name="content"></textarea>

            <?php
                foreach ($db->query("SELECT * FROM Topics") as $row) {
                    echo "<input type='checkbox' name='topic" . $row['id'] . "' value='" . $row['id'] . "'> " . $row['name'] . "<br>";
                }
            ?>

            <button type="submit">Submit</button>
        </form>
    </body>
</html>
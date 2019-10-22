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

/*if (isset($_POST['topic'])) {
    $topic = $_POST['topic'];
} else {
    $topic = "";
}
*/

$book = $_POST['book'];
$chapter = $_POST['chapter'];
$verse = $_POST['verse'];
$content = $_POST['content'];

$sql = 'INSERT INTO Scriptures (book, chapter, verse, content) VALUES (:book, :chapter, :verse, :content)';
$stmt = $db->prepare($sql);

$stmt->bindValue(':book', $book, PDO::PARAM_STR);
$stmt->bindValue(':chapter', $chapter, PDO::PARAM_INT);
$stmt->bindValue(':verse', $verse, PDO::PARAM_STR);
$stmt->bindValue(':content', $content, PDO::PARAM_STR);

$stmt->execute();
?>
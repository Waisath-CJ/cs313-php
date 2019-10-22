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
$scripture_id = $db->lastInsertId('scriptures_id_seq');

$topic = $_POST['topic'];
if (!empty($topic)) {
    $n = count($topic);

    for ($i = 0; $i < $n; $i++) {
        $sql = 'INSERT INTO Scripture_Topic (scripture_id, topic_id) VALUES (:scrip_id, :topic_id)';
        $stmt = $db->prepare($sql);

        $stmt->bindValue(':scrip_id', $scripture_id, PDO::PARAM_INT); 
        $stmt->bindValue(':topic_id', $topic[$i], PDO::PARAM_INT);
        
        $stmt->execute();
    }
}
?>
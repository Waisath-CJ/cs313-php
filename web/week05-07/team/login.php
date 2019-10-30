<?php
    require("dbConnect.php");
	$db = get_db();
​
	$username = $_POST['username'];
	$pwd = $_POST['pwd'];
​
	if (empty($username) || empty($pwd)) {
        $message = "Missing fields!";
        header("Location: sign_in.php?message=$message");
        die();
    }

    try {
        $query = 'SELECT username FROM People';
        $stmt = $db->prepare($query);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if ($username == $row['username']) {
                $message = "Username or password incorrect";
                header("Location: sign_in.php?message=$message");
                die();
            }
        }
    }
    catch (Exception $ex) {
        echo "Error with DB. Details: $ex";
        die();
    }


?>